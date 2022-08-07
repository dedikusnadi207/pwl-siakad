<?php

namespace App\Http\Controllers;

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

        return view('admin.study-program.index', compact('data','activeUrl'));
    }

    public function save(Request $request)
    {
        Validator::make($request->all(), [
            'short_name' => 'required|unique:faculties,short_name,'.$request->id.',id',
            'name' => 'required',
        ])->validate();
        StudyProgram::updateOrCreate(
            ['id' => $request->id],
            ['short_name' => $request->short_name, 'name' => $request->name],
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
        return Datatables::of(StudyProgram::query())
            ->addColumn('action', function ($data)
            {
                $url = url('study-program');
                return view('components.action', compact('data', 'url'));
            })
            ->make(true);
    }
}
