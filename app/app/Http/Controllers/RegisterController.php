<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('pages.register');
    }

    public function register(RegisterRequest $request)
    {
        /** @var User $user */
        $user = User::query()->create($request->validated());

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
}
