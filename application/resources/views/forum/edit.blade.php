@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h2>スレッド作成</h2>
        <form id="fbody1" action="{{route('forum.update',[$forum->id])}}" method="POST">
            {{csrf_field()}}
            @method('PUT')
            <div class="form-group" data-form="f1">
                @include('components.forms.input',[
                    'id'=>'title','title'=>'タイトル','type'=>'text','class'=>'','placeholder'=>'','expText'=>'50文字以内で入力してください。',
                    'max'=>'','min'=>'','maxlength'=>'50','minlength'=>'1',
                    'value'=>$forum->title,
                    'required'=>true,'readonly'=>false,
                ])
            </div>
            <div class="form-group" data-form="f2">
                @include('components.forms.select',[
                    'id'=>'category','title'=>'カテゴリ','expText'=>'カテゴリを選択してください。',
                    'options'=>[
                        'category1'=>'テストカテゴリ1',
                        'category2'=>'テストカテゴリ2'
                    ],
                    'selectedValue'=> $forum->category
                ])
            </div>
            <div class="form-group" data-form="f3">
                @include('components.forms.textarea',[
                    'id'=>'content','title'=>'内容','class'=>'','expText'=>'内容を500文字以内で入力してください。',
                    'maxlength'=>'500','minlength'=>'1',
                    'value'=>$forum->content,
                    'rows'=>'5','cols'=>'5',
                    'required'=>true,'readonly'=>false,
                ])
            </div>
            <div class="form-group" data-form="f4">
                @include('components.forms.select',[
                    'id'=>'status','title'=>'公開ステータス','expText'=>'公開ステータスを選択してください。',
                    'options'=>$optStatus,
                    'selectedValue'=> $forum->status
                ])
            </div>
            @include('components.forms.btn-submit',['btnType'=> 'btn-primary','class'=>'btn-block','title'=>'送信'])
        </form>

        @foreach($forum->files as $file)
            <form id="fbody2" action="{{route('forum.file.destroy',['file'=>$file->id,'forum'=>$forum->id])}}" method="POST">
                {{csrf_field()}}
                @method('delete')
                <div class="form-group" data-form="f5">
                    <p>{{$file->name}}：
                        @include('components.forms.btn-submit',['btnType'=> 'btn-danger','class'=>'','title'=>'削除'])
                    </p>
                </div>
            </form>
        @endforeach

    </div>
</div>
@endsection
