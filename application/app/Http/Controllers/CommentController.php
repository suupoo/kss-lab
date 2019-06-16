<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Packages\Ksslab\Forum\Domain\Entity\TableModels\Forum;
use Packages\Ksslab\Forum\Domain\Entity\TableModels\Comment;
use Packages\Ksslab\Forum\Service\ForumService;

class CommentController extends Controller
{

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
     * @return void
     */
    public function index(ForumService $forumService)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $forum_id
     * @param ForumService $forumService
     * @return void
     */
    public function store(Request $request , int $forum_id, ForumService $forumService)
    {
        $forum = $forumService->postComment($forum_id, $request->toArray());
        return redirect(route('forum.show',['forum_id' => $forum_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
