@extends('layouts.app')

@section('content')

<div class="row" id="adUser">
    <div class="col">
        アカウント情報

        <hr />

        <p><b>ユーザ名:</b>{{$user->name}}</p>
        <p><b>公開ID:</b>{{$user->public_id}}</p>
        <p><b>国コード:</b>{{$user->country_cd}}</p>
        <p><b>電話番号:</b>{{$user->phone_number}}</p>
        <p><b>メールアドレス:</b>{{$user->email}}</p>
        <p><b>登録日:</b>{{$user->created_at}}</p>
        <p><b>権限種別:</b>{{$user->display_admin_role}}</p>

    </div>

    <div class="col">
        <form action="{{route('admin.user.destroy',$user->public_id)}}" method="post">
            {{csrf_field()}}
            @method('DELETE')

            <button type="submit" class="btn btn-danger">
                削除
            </button>
        </form>
    </div>
</div>

@endsection
