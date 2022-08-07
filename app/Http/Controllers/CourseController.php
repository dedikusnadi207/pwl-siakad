<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $data = Course::firstOrNew(['id' => $request->id]);

        return view('admin.course.index', compact('data'));
    }

    public function save(Request $request)
    {
        Validator::make($request->all(), [
            'code' => 'required|unique:courses,code,'.$request->id.',id',
            'name' => 'required',
            'sks' => 'required|numeric|min:1',
        ])->validate();
        Course::updateOrCreate(
            ['id' => $request->id],
            ['code' => $request->code, 'name' => $request->name, 'sks' => $request->sks],
        );

        return redirect('course')->with('success', __('common.data_saved'));
    }

    public function destroy($id)
    {
        $data = Course::find($id);
        if ($data) {
            $data->delete();
        }

        return response()->json(__('common.data_deleted'), 200);
    }

    public function data()
    {
        return Datatables::of(Course::query())
            ->addColumn('action', function ($data)
            {
                $url = url('course');
                return view('components.action', compact('data', 'url'));
            })
            ->make(true);
    }
}
