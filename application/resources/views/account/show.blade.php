@extends('layouts.app')

@section('content')

<div class="row" id="forum">
    <div class="col">
        アカウント情報

        <hr />

        <p><b>ユーザ名:</b>{{$account->name}}</p>
        <p><b>公開ID:</b>{{$account->public_id}}</p>

        @if(\Illuminate\Support\Facades\Auth::id() == $account->id)
        <p><b>国コード:</b>{{$account->country_cd}}</p>
        <p><b>電話番号:</b>{{$account->phone_number}}</p>
        <p><b>メールアドレス:</b>{{$account->email}}</p>
        <p><b>認証:</b>@isset($account->email_verified_at){{$account->email_verified_at}}@endisset</p>

        <p><b>登録日:</b>{{$account->created_at}}</p>
        <p><b>更新日:</b>{{$account->updated_at}}</p>
        @endif

    </div>
</div>

@endsection
