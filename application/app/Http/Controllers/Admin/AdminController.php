<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {

    }

    /**
     *
     * トップページのアクション
     *
     * @return view
     */
    public function index(){
        return view('admin.index');
    }
}
