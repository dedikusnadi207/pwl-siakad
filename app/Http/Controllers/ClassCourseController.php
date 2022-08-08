<?php

namespace App\Http\Controllers;

use App\AppClass;
use App\ClassCourse;
use App\Course;
use App\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class ClassCourseController extends Controller
{
    public function index(Request $request)
    {
        $data = ClassCourse::firstOrNew(['id' => $request->id]);
        $activeUrl = url('class-course');
        $classes = [];
        foreach (AppClass::pluck('id', 'name') as $key => $value) {
            $classes[] = ['value' => $value, 'text' => $key];
        }
        $courses = [];
        foreach (Course::pluck('id', 'name') as $key => $value) {
            $courses[] = ['value' => $value, 'text' => $key];
        }
        $lecturers = [];
        foreach (Lecturer::pluck('id', 'name') as $key => $value) {
            $lecturers[] = ['value' => $value, 'text' => $key];
        }

        return view('admin.class-course.index', compact('data', 'activeUrl', 'classes', 'courses', 'lecturers'));
    }

    public function save(Request $request)
    {
        Validator::make($request->all(), [
            'class_id' => 'required',
            'course_id' => 'required',
            'lecturer_id' => 'required',
            // 'day' => 'required',
            // 'start_time_schedule' => 'required',
            // 'end_time_schedule' => 'required',
        ])->validate();
        ClassCourse::updateOrCreate(
            ['id' => $request->id],
            [
                'class_id' => $request->class_id,
                'course_id' => $request->course_id,
                'lecturer_id' => $request->lecturer_id,
                // 'day' => $request->day,
                // 'start_time_schedule' => $request->start_time_schedule,
                // 'end_time_schedule' => $request->end_time_schedule,
            ],
        );

        return redirect('class-course')->with('success', __('common.data_saved'));
    }

    public function destroy($id)
    {
        $data = ClassCourse::find($id);
        if ($data) {
            $data->delete();
        }

        return response()->json(__('common.data_deleted'), 200);
    }

    public function data()
    {
        return Datatables::of(ClassCourse::with('class','course','lecturer'))
            // ->addColumn('day', function ($data)
            // {
            //     return __('day.'.$data->day);
            // })
            // ->addColumn('start_time_schedule', function ($data)
            // {
            //     return substr($data->start_time_schedule, 0, 5);
            // })
            // ->addColumn('end_time_schedule', function ($data)
            // {
            //     return substr($data->end_time_schedule, 0, 5);
            // })
            ->addColumn('action', function ($data)
            {
                $url = url('class-course');
                return view('components.action', compact('data', 'url'));
            })
            ->make(true);
    }
}
