<?php

namespace App\Executors\Admin;

use App\Contracts\ProfileInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Profile implements ProfileInterface {

    public function view()
    {
        return view('admin.account.profile');
    }

    public function save(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
        ])->validate();
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('account/profile')->with('success', __('common.data_saved'));
    }
}
