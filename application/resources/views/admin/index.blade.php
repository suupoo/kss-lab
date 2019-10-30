@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h1 class="">管理</h1>
    </div>
</div>
<hr class="my-2">
<div class="row">
    <div class="col">
        <ul class="list-group list-group-flush">
            <a class="nav-link" href="{{ route('admin.user.index') }}">ユーザ</a>
        </ul>
    </div>
</div>
@endsection
