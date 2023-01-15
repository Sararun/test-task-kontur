<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPostRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @param Request $request
     * @return Request
     */
    public function store(UserPostRequest $request): UserResource
    {
        $createUser = User::create($request->validated());
        return new UserResource($createUser);
    }
}
