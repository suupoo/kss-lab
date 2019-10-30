@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1>ユーザ管理</h1>
    </div>
</div>
<hr class="my-2">
<div class="row">
    <div class="col">
        <ul class="list-group list-group-flush">
            @foreach($users as $user)
            <li class="list-group-item">
                <a href="{{route('admin.user.show',['id'=>$user->public_id])}}">{{$user->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
