<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

use App\Repositories\Slack\SlackRepository;
use App\Notifications\Slack;
use App\Notifications\Sms;

class LoginListener
{
    protected $login_notify;
    protected $slackRepository;

    private $ip;
    private $agent;

    /**
     * Create the event listener.
     *
     * @param Request $request
     * @param SlackRepository $slackRepository
     */
    public function __construct(Request $request,SlackRepository $slackRepository)
    {
        $this->request = $request;

        $this->ip = $this->request->ip();
        $this->agent = $this->request->header('User-Agent');

        $this->login_notify = env('LOGIN_NOTIFY', null);
        $this->slackRepository = $slackRepository;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        $message = "【ログイン】{$user->name} from {$this->ip}";

        if($this->login_notify === "slack"){
            // Login Notify to Slack
            $this->slackRepository->notify(
                new Slack($message)
            );
        }else if($this->login_notify === "sms"){
            // Login Notify to SMS
            $user->notify(new Sms($message));
        }
    }

    /**
     * IPアドレスからホスト名を取得します。
     * @param $ip
     * @return string hostname
     */
    private function getHost($ip)
    {
        return gethostbyaddr($ip);
    }
}
