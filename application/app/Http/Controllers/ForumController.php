<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Packages\Ksslab\Forum\Domain\Entity\TableModels\Forum;
use Packages\Ksslab\Forum\Service\ForumService;

class ForumController extends Controller
{
    protected $updOptions =[
        'parDir'        => "forum/uploads",
        'maxByteSize'   => 52428800,
        'extensions'    => [
            // document
            'csv','ppt','pdf',
            // Image
            'jpg','jpeg','png','gif',
            // Movie
            'mp4','wmv',
            // Sound
            'mp3',
        ],
    ] ;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param ForumService $forumService
     * @return \Illuminate\Http\Response
     */
    public function index(ForumService $forumService)
    {
        return view('forum.index',['forums'=>$forumService->getList()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ForumService $forumService
     * @return \Illuminate\Http\Response
     */
    public function create(ForumService $forumService)
    {
        return view('forum.create',['optStatus' => $forumService->getOptStatus() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param ForumService $forumService
     * @return void
     */
    public function store(Request $request,ForumService $forumService)
    {
        // 掲示板の作成
        $forum = $forumService->create($request->toArray(),[
            'notifiable'=>['slack'=>true]
        ]);
//        // 添付ファイルの登録
        if($request->file('updFile01'))
            $file = $forumService->fileUpload(
                $forum,
                $request->file('updFile01'),
                $this->updOptions
            );
        if($forum){
            return redirect('forum/'.$forum->id.'/edit');
        }
        return redirect()->route('forum.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $forum_id
     * @param ForumService $forumService
     * @return \Illuminate\Http\Response
     */
    public function show($forum_id, ForumService $forumService)
    {
        $forumData = $forumService->get($forum_id);

        if(!$forumData)
            return redirect()->route('forum.index');

        return view('forum.show', $forumData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Forum $forum
     * @param ForumService $forumService
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum, ForumService $forumService)
    {
        $optStatus = $forumService->getOptStatus();

        //見えないように設定されている場合
        //非公開設定かつ自分以外が作成した掲示板の場合
        if( $forum->{Forum::VISIBLE} == false ||
            ( $forum->{Forum::STATUS} != 1 && $forum->{Forum::USER_ID} !== Auth::id())
        )
            return redirect()->route('forum.index');

        return view('forum.edit',compact('forum','optStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Forum $forum
     * @param ForumService $forumService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum,ForumService $forumService)
    {
        // 更新実行
        $updated = $forumService->update($forum->id,$request->toArray());

        // 添付ファイルの登録
        if($request->file('updFile01'))
            $file = $forumService->fileUpload(
                $updated,
                $request->file('updFile01'),
                $this->updOptions
            );

        return redirect('forum/'.$updated->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Forum $forum
     * @param ForumService $forumService
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Forum $forum,ForumService $forumService)
    {
        $forumService->delete($forum->id);
        return redirect()->route('forum.index');
    }
}
