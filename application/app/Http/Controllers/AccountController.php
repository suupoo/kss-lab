<?php

namespace App\Http\Controllers;

use App\Http\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Packages\Common\Service\AccountService;

class AccountController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param string $public_id
     * @param AccountService $accountService
     * @return \Illuminate\Http\Response
     */
    public function show(string $public_id,AccountService $accountService)
    {
        return view('account.show',$accountService->get($public_id));
    }
}
