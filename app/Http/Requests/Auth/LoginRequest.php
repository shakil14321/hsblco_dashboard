<?php

namespace App\Http\Requests\Auth;

use App\Http\Repository\AuthRepository;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function __construct(
        protected AuthRepository $authRepository
    ) {}

    public function login(LoginRequest $request)
    {
        if (!$this->authRepository->login($request->validated())) {
            return back()->withErrors([
                'email' => 'Invalid credentials'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
}
