@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <h2>スレッド作成</h2>
        <form id="fbody1" action="{{route('forum.store')}}" method="POST">
            {{csrf_field()}}
            <div class="form-group" data-form="f1">
                @include('components.forms.input',[
                    'id'=>'title','title'=>'タイトル','type'=>'text','class'=>'','placeholder'=>'','expText'=>'50文字以内で入力してください。',
                    'max'=>'','min'=>'','maxlength'=>'50','minlength'=>'1',
                    'value'=>'',
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
                ])
            </div>
            <div class="form-group" data-form="f3">
                @include('components.forms.textarea',[
                    'id'=>'content','title'=>'内容','class'=>'','expText'=>'内容を500文字以内で入力してください。',
                    'maxlength'=>'500','minlength'=>'1',
                    'value'=>'',
                    'rows'=>'5','cols'=>'5',
                    'required'=>true,'readonly'=>false,
                ])
            </div>
            <div class="form-group" data-form="f4">
                @include('components.forms.select',[
                    'id'=>'status','title'=>'公開ステータス','expText'=>'公開ステータスを選択してください。',
                    'options'=>\App\Http\Models\Forum::getOptionForStatus(),
                ])
            </div>
            @include('components.forms.btn-submit',['btnType'=> 'btn-primary','class'=>'btn-block','title'=>'送信'])
        </form>
    </div>
</div>
@endsection
