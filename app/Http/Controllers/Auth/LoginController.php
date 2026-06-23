<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Repository\AuthRepository;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function __construct(
        protected AuthRepository $authRepository
    ) {}


    public function login(LoginRequest $request)
    {

//        dd($request->validated());
        $credentials = $request->validated();

        if (!$this->authRepository->login($credentials)) {
            return back()->withErrors([
                'email' => 'Invalid credentials',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
}
