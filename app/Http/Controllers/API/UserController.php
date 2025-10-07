<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\UserStatus;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return User::paginate(15);
    }

    public function store(Request $request)
    {
        $data = $request->validated();
        if (!isset($data['status'])) {
            $data['status'] = UserStatus::ENABLED;
        }
        $user = User::create($data);
        return response()->json($user, 201);
    }

    public function show(User $user)
    {
        return $user;
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->validated());
        return response()->json($user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }
}
