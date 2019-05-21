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
<div class="row my-2" id="comments">
    <form action="" method="post">
        {{csrf_field()}}
    </form>
    <div class="col-10">
        <div class="form-group" data-form="f2">
            @include('components.forms.select',[
                'id'=>'category','title'=>'カテゴリ','expText'=>'カテゴリを選択してください。',
                'options'=>[
                    'category1'=>'テストカテゴリ1',
                    'category2'=>'テストカテゴリ2'
                ],
            ])
        </div>
    </div>
    <div class="col-2">
        @include('components.forms.btn-submit',['btnType'=> 'btn-primary','class'=>'btn-block','title'=>'書き込み'])
    </div>
</div>
@endsection
