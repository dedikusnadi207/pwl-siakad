<?php

namespace App\Http\Controllers;

use App\Services\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private ProfileService $profileService;

    public function __construct(
        ProfileService $profileService
    ) {
        $this->middleware(function ($request, $next) use ($profileService) {
            $this->profileService = $profileService;
            $this->profileService->init(Auth::user());
            return $next($request);
        });
    }
    public function profile()
    {
        return $this->profileService->view();
    }

    public function saveProfile(Request $request)
    {
        return $this->profileService->save($request);
    }

    public function changePassword(Request $request)
    {
        return $this->profileService->changePassword($request);
    }
}
