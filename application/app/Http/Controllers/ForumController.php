<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Packages\Ksslab\Forum\Domain\Entity\TableModels\Forum;
use Packages\Ksslab\Forum\Service\ForumService;

class ForumController extends Controller
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
        $data = [
            Forum::USER_ID => Auth::id(),
            Forum::TITLE => $request->input(Forum::TITLE),
            Forum::CONTENT =>$request->input(Forum::CONTENT),
            Forum::CATEGORY_ID =>Forum::getReverseOptionStatus($request->input(Forum::CATEGORY_ID)),
            Forum::EDIT_USER => Auth::id(),
            Forum::STATUS =>(int)$request->input(Forum::STATUS),
            Forum::VISIBLE => true,
        ];
        $forum = $forumService->create($data);
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
        $forum = $forumService->get($forum_id);

        if(!$forum)
            return redirect()->route('forum.index');

        return view('forum.show',['forum'=> $forum]);
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
        $forum->fill($request->all());
        $updated = $forumService->update($forum);
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
