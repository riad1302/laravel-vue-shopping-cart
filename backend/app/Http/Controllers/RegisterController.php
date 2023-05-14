<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            $role = Role::where('name', config('constant.role_user'))->first();
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $role->id,
                'password' => Hash::make($request->password),
            ];
            $user = User::create($data);
            if (! empty($user)) {
                return $this->sendResponse([], 'User Registration Successfully');
            } else {
                return $this->sendError([], 'User Registration Failed');
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }
}
