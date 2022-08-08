<?php

namespace App\Http\Controllers;

use App\AppClass;
use App\Constants\UserType;
use App\Colleger;
use App\CollegerStudyProgram;
use App\Constants\CollegerStatus;
use App\Services\FileService;
use App\StudyProgram;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CollegerController extends Controller
{
    private FileService $fileService;

    public function __construct(
        FileService $fileService
    ) {
        $this->fileService = $fileService;
    }

    public function index(Request $request)
    {
        $data = Colleger::firstOrNew(['user_id' => $request->id]);
        $activeUrl = url('colleger');
        $appClass = AppClass::select('type')->distinct()->pluck('type');
        $classTypes = [];
        foreach ($appClass as $value) {
            $classTypes[] = [
                'value' => $value,
                'text' => $value,
            ];
        }
        $status = [
            [
                'value' => CollegerStatus::ACTIVE,
                'text' => CollegerStatus::ACTIVE,
            ], [
                'value' => CollegerStatus::INACTIVE,
                'text' => CollegerStatus::INACTIVE,
            ],
        ];
        $studyPrograms = [];
        foreach (StudyProgram::all(['id', 'name']) as $value) {
            $studyPrograms[] = ['value' => $value->id, 'text' => $value->name];
        }

        return view('admin.colleger.index', compact('data', 'activeUrl', 'classTypes', 'status', 'studyPrograms'));
    }

    public function save(Request $request)
    {
        Validator::make($request->all(), [
            'nik' => 'required|numeric|unique:collegers,nik,'.$request->id.',user_id',
            'name' => 'required',
            'npm' => 'required|unique:collegers,npm,'.$request->id.',user_id',
            'email' => 'required|email|unique:users,email,'.$request->id,
            'telephone' => 'required|min:8|max:16',
            'password' => ($request->id ? 'nullable' : 'required').'|min:8|confirmed',
            'address' => 'required',
            'npwp' => 'nullable|numeric',
            'birth_place' => 'required',
            'birth_date' => 'required|date',
            'photo' => 'nullable|file|max:800',
            'year' => 'required',
            'status' => 'required',
            'class_type' => 'required',
            'class_group' => 'required',
            'semester' => 'required',
        ])->validate();
        DB::beginTransaction();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'user_type' => UserType::COLLEGER,
        ];
        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }
        $user = User::updateOrCreate(
            ['id' => $request->id],
            $data,
        );
        $colleger = Colleger::updateOrCreate(
            ['user_id' => $user->id],
            [
                'user_id' => $user->id,
                'nik' => $request->nik,
                'name' => $request->name,
                'npm' => $request->npm,
                'email' => $request->email,
                'telephone' => purifyTelephone($request->telephone),
                'address' => $request->address,
                'npwp' => $request->npwp,
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'photo' => $this->fileService->upload($request->file('photo'), 'colleger'),
                'year' => $request->year,
                'status' => $request->status,
                'class_type' => $request->class_type,
                'class_group' => $request->class_group,
                'semester' => $request->semester,
            ]
        );
        CollegerStudyProgram::updateOrCreate(
            ['colleger_id' => $colleger->id],
            [
                'colleger_id' => $colleger->id,
                'study_program_id' => $request->study_program_id,
                'class_group' => $request->class_group,
            ]
        );
        DB::commit();

        return redirect('colleger')->with('success', __('common.data_saved'));
    }

    public function destroy($id)
    {
        $data = User::find($id);
        if ($data) {
            $data->colleger->delete();
            $data->delete();
        }

        return response()->json(__('common.data_deleted'), 200);
    }

    public function data()
    {
        return Datatables::of(Colleger::query())
            ->addColumn('action', function ($data)
            {
                $data = $data->user;
                $url = url('colleger');

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
