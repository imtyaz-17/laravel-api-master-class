<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function index()
    {
        if ($this->include('tickets')) {
            return UserResource::collection(User::with('tickets')->paginate());
        }
        return UserResource::collection(User::paginate());
    }

    public function store(Request $request)
    {
    }

    public function show(User $user)
    {
        if ($this->include('tickets')) {
            return new UserResource($user->load('tickets'));
        }
        return new UserResource($user);
    }

    public function update(Request $request, User $user)
    {
    }

    public function destroy(User $user)
    {
    }
}
