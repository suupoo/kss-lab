@extends('layouts.app')

@section('content')

<div class="row" id="forum">
    <div class="col">
        <div class="card text-center">
            <div class="card-header">
                {{$forum->title}}
            </div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">
                    <small class="text-muted">
                        {{$forum->content}}
                    </small>
                </p>
            </div>
            <div class="card-footer text-muted">
                <div class="row">
                    <div class="col-md-6 my-md-2 col-sm-12 my-sm-1">
                        <span>
                            最終更新：{{$forum->updated_at}}
                        </span>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::id() == $forum->user_id)
                    <div class="col-md-6 my-md-2 col-6 my-1">
                        <a href="{{route('forum.edit',$forum->id)}}">
                            <i class="fa fa-edit fa-fw" aria-hidden="true"></i>編集
                        </a>
                    </div>
                    <div class="col-md-12 my-md-2 col-6 my-1">
                        <form method="post" action="{{route('forum.destroy',$forum->id)}}" name="trash">
                            {{csrf_field()}}
                            @method('DELETE')
                            <a href="javascript:trash.submit()" style="color:red">
                                <i class="fa fa-trash fa-fw" aria-hidden="true" ></i>削除
                            </a>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row" id="comments">
    <div class="col">
        <form action="{{route('forum.comment.store',['forum_id'=>$forum->id])}}" method="post">
            {{csrf_field()}}
            <div class="form-row align-items-center">
                <div class="col-10 col-sm-12">
                    @include('components.forms.input',[
                        'id'=>'comment','title'=>'コメント','type'=>'text','class'=>'','placeholder'=>'','expText'=>'コメントは250文字以内で投稿できます。',
                        'max'=>'250','min'=>'1','maxlength'=>'250','minlength'=>'1',
                        'value'=>'',
                        'required'=>true,'readonly'=>false,
                    ])
                </div>
                <div class="col-2 col-sm-12">
                    @include('components.forms.btn-submit',['btnType'=> 'btn-primary','class'=>'btn-block','title'=>'書き込み'])
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="card" style="width: 18rem;">
            <ul class="list-group list-group-flush">
            @foreach($forum->comments as $comment)
                @if( array_key_exists($comment->user_id,$commentUsers))
                    {{-- todo:退会済みユーザのコメントを残す  --}}
                    @component('components.comment.comment',['comment'=>$comment,'user'=>$commentUsers[$comment->user_id]])@endcomponent
                @endif
            @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="row" id="files">
    <div class="col">
        @foreach($forum->files as $file)
            <a href="{{route('forum.file.show',['forum_id'=>$forum->id,'file_id'=>$file->id])}}" class="btn btn-link" >{{$file->name}}</a>
        @endforeach
    </div>
</div>

@endsection
