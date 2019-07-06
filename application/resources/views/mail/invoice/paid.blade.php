@component('mail::message')
#KSS-Lab's Summary

今月の月次報告です。

##プロジェクト

###KSS-Portal
@component('mail::button', ['url' => 'https://github.com/suupoo/kss-lab/tree/develop'])
    GitHub
@endcomponent

###請求金額
@component('mail::table')
    |   メンバ名    | 発生金額 | 最終清算月 |累積請求額|
    | ------------ | -------- | --------- | -------- |
    | K.H          | -------- | --------- | -------- |
    | S.O          | -------- | --------- | -------- |
    | S.M          | -------- | --------- | -------- |
@endcomponent

以上。

{{ config('app.name') }}運営チーム
@endcomponent