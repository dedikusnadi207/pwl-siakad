<?php

namespace App\Http\Controllers;

use App\Constants\UserType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $data = User::firstOrNew(['id' => $request->id]);
        $activeUrl = url('admin');

        return view('admin.admin.index', compact('data', 'activeUrl'));
    }

    public function save(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$request->id.',id',
            'password' => 'required|min:8|confirmed'
        ])->validate();
        User::updateOrCreate(
            ['id' => $request->id],
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => UserType::ADMIN,
            ],
        );

        return redirect('admin')->with('success', __('common.data_saved'));
    }

    public function destroy($id)
    {
        $data = User::find($id);
        if ($data) {
            $data->delete();
        }

        return response()->json(__('common.data_deleted'), 200);
    }

    public function data()
    {
        return Datatables::of(User::where('user_type', UserType::ADMIN))
            ->addColumn('action', function ($data)
            {
                $url = url('admin');
                return view('components.action', compact('data', 'url'));
            })
            ->make(true);
    }
}
