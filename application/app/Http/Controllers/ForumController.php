<?php

namespace App\Http\Controllers;

use App\Http\Models\Forum;
use Illuminate\Http\Request;

use App\Services\ForumService;
use Illuminate\Support\Facades\Auth;

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
        $forumService->getList();
        return view('forum.index',['forums'=>$forumService->getForum()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forum.create');
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
            Forum::TITLE => Auth::id(),
            Forum::CONTENT =>$request->input(Forum::CONTENT),
            Forum::CATEGORY_ID =>Forum::getReverseOptionStatus($request->input(Forum::CATEGORY_ID)),
            Forum::EDIT_USER => Auth::id(),
            Forum::STATUS =>(int)$request->input(Forum::STATUS),
            Forum::VISIBLE => true,
        ];
        $forumService->create($data);

        if($forumService->isCreate()){
            return redirect('forum/'.$forumService->getId().'/edit');
        }

        return redirect()->route('forum.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        //見えないように設定されている場合
        if( $forum->{Forum::VISIBLE} == false)
            return redirect()->route('forum.index');
        //非公開設定かつ自分以外が作成した掲示板の場合
        if( $forum->{Forum::STATUS} != 1 && $forum->{Forum::USER_ID} !== Auth::id())
            return redirect()->route('forum.index');

        return view('forum.show',['forum'=>$forum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        //
    }
}
