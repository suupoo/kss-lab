@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <a href="{{route('forum.create')}}" class="btn btn-primary btn-block">
            新規作成
        </a>
    </div>
</div>
<hr class="my-2">
<div class="row">
    <div class="col">
        <ul class="list-group list-group-flush">
            @foreach($forums as $forum)
            <li class="list-group-item">
                <a href="{{route('forum.show',$forum->id)}}">
                    {{$forum->title}}
                </a>
                @isset($forum->comments)
                <span>({{count($forum->comments)}})</span>
                @endisset

                @if(count($forum->files)>0)
                <i class="fa fa-file" aria-hidden="true"></i>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
