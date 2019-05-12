@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <ul class="list-group list-group-flush">
            @foreach($forums as $forum)
            <li class="list-group-item">
                <a href="{{route('forum.show',$forum->id)}}">
                    {{$forum->title}}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
