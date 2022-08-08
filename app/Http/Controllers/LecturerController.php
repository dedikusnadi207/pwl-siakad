<?php

namespace App\Http\Controllers;

use App\Constants\UserType;
use App\Lecturer;
use App\Services\FileService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LecturerController extends Controller
{
    private FileService $fileService;

    public function __construct(
        FileService $fileService
    ) {
        $this->fileService = $fileService;
    }

    public function index(Request $request)
    {
        $data = Lecturer::firstOrNew(['user_id' => $request->id]);
        $activeUrl = url('lecturer');

        return view('admin.lecturer.index', compact('data', 'activeUrl'));
    }

    public function save(Request $request)
    {
        Validator::make($request->all(), [
            'nik' => 'required|numeric|unique:lecturers,nik,'.$request->id.',user_id',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'title' => 'required',
            'telephone' => 'required|min:8|max:16',
            'password' => ($request->id ? 'nullable' : 'required').'|min:8|confirmed',
            'photo' => 'nullable|file|max:800',
        ])->validate();
        DB::beginTransaction();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => UserType::LECTURER,
        ];
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }
        $user = User::updateOrCreate(
            ['id' => $request->id],
            $data,
        );
        Lecturer::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id' => $user->id,
                'nik' => $request->nik,
                'name' => $request->name,
                'email' => $request->email,
                'title' => $request->title,
                'telephone' => purifyTelephone($request->telephone),
                'photo' => $this->fileService->upload($request->file('photo'), 'lecturer'),
            ]
        );
        DB::commit();

        return redirect('lecturer')->with('success', __('common.data_saved'));
    }

    public function destroy($id)
    {
        $data = User::find($id);
        if ($data) {
            $data->lecturer->delete();
            $data->delete();
        }

        return response()->json(__('common.data_deleted'), 200);
    }

    public function data()
    {
        return Datatables::of(Lecturer::query())
            ->addColumn('action', function ($data)
            {
                $data = $data->user;
                $url = url('lecturer');

                return view('components.action', compact('data', 'url'));
            })
            ->addColumn('photo', function ($data)
            {
                $photo = $data->user->publicPhoto();

                return view('components.tablePhoto', compact('photo'));
            })
            ->make(true);
    }
}
