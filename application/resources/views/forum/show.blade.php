@extends('layouts.app')

@section('content')
<div class="row">
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
                最終更新：{{$forum->updated_at}}
            </div>
        </div>
    </div>
</div>

<div class="row my-3">
    <div class="col">
        <a href="{{route('forum.edit',$forum->id)}}" class="btn btn-primary btn-block">
            編集
        </a>
    </div>
    <div class="col">
        <form method="post" action="{{route('forum.destroy',$forum->id)}}">
            {{csrf_field()}}
            @method('DELETE')
            <input type="submit" value="削除" class="btn btn-danger btn-block" />
        </form>
    </div>
</div>
@endsection
