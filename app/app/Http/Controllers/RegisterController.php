<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function show(): View
    {
        return view('pages.register');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        /** @var User $user */
        $user = User::query()->create($request->validated());

        auth()->login($user);

        return redirect('/')->with('success', "Вы успешно зарегистрировались");
    }
}
