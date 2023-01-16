<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Http\Resources\UserResource;
use App\Mail\UserData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function store(UserPostRequest $request)
    {
        $admins = DB::table('users')->where('is_admin',true)->get();
        $createUser = User::create($request->validated());
        foreach ($admins as $a) {
            info($a->email);
            Mail::to($a->email)->send(new UserData($createUser));
        }
        return new UserResource($createUser);
    }
}
