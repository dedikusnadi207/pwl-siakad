<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class StudyProgramController extends Controller
{
    public function index(Request $request)
    {
        $data = StudyProgram::firstOrNew(['id' => $request->id]);
        $activeUrl = url('study-program');
        $faculties = [];
        foreach (Faculty::pluck('id', 'name') as $key => $value) {
            $faculties[] = ['value' => $value, 'text' => $key];
        }

        return view('admin.study-program.index', compact('data','activeUrl', 'faculties'));
    }

    public function save(Request $request)
    {
        Validator::make($request->all(), [
            'faculty_id' => 'required',
            'name' => 'required',
            'accreditation' => 'required',
        ])->validate();
        StudyProgram::updateOrCreate(
            ['id' => $request->id],
            ['faculty_id' => $request->faculty_id, 'name' => $request->name, 'accreditation' => $request->accreditation],
        );

        return redirect('study-program')->with('success', __('common.data_saved'));
    }

    public function destroy($id)
    {
        $data = StudyProgram::find($id);
        if ($data) {
            $data->delete();
        }

        return response()->json(__('common.data_deleted'), 200);
    }

    public function data()
    {
        return Datatables::of(StudyProgram::with('faculty'))
            ->addColumn('action', function ($data)
            {
                $url = url('study-program');
                return view('components.action', compact('data', 'url'));
            })
            ->make(true);
    }
}
