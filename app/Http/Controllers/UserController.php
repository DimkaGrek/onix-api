<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile() {
        return auth('api')->user();
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }
}
