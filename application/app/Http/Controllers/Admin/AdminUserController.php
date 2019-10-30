<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Packages\Common\Service\Admin\AdminUserService;

class AdminUserController extends Controller
{
    public function __construct()
    {

    }

    /**
     *
     * トップページのアクション
     *
     * @param AdminUserService $adminUserService
     * @return view
     */
    public function index(AdminUserService $adminUserService)
    {
        return view('admin.user.index',['users'=>$adminUserService->getList()]);
    }

    /**
     * Display the specified resource.
     *
     * @param $user_id
     * @param AdminUserService $adminUserService
     * @return \Illuminate\Http\Response
     */
    public function show($user_id, AdminUserService $adminUserService)
    {
        return view('admin.user.show',['user'=>$adminUserService->get($user_id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $user_id
     * @param AdminUserService $adminUserService
     * @return void
     */
    public function destroy($user_id, AdminUserService $adminUserService)
    {
        //削除
        //todo:削除実行時のエラー処理
        $adminUserService->delete($user_id);

        return redirect()->route('admin.user.index');
    }
}
