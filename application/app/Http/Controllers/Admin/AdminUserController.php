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
}
