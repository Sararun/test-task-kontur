<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function store(UserPostRequest $request)
    {
        $admins = DB::table('users')->where('is_admin', '=', 'true');
        foreach ($admins as $a) {
            Mail::to($a)->send($request);
        }
        $createUser = User::create($request->validated());

        return new UserResource($createUser);
    }
}
