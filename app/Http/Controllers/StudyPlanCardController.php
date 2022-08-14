<?php

namespace App\Http\Controllers;

use App\AppClass;
use App\ClassCourse;
use App\StudyPlanCard;
use App\StudyPlanCardDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;

class StudyPlanCardController extends Controller
{
    public function index(Request $request)
    {
        $data = StudyPlanCard::firstOrNew(['id' => $request->id]);
        $activeUrl = url('study-plan-card');
        $appClass = AppClass::select('type')->distinct()->pluck('type');
        $classTypes = [];
        foreach ($appClass as $value) {
            $classTypes[] = [
                'value' => $value,
                'text' => $value,
            ];
        }

        return view('admin.study-plan-card.index', compact('data', 'activeUrl', 'classTypes'));
    }

    public function save(Request $request)
    {
        Validator::make($request->all(), [
            'class_type' => 'required',
            'class_group' => 'required',
            'semester' => 'required',
        ])->validate();
        $check = StudyPlanCard::where('id', '<>', $request->id)->where([
            'class_type' => $request->class_type,
            'class_group' => $request->class_group,
            'semester' => $request->semester,
        ])->first();
        if ($check) {
            return redirect()->back()->withInput($request->all())->with('error', __('errors.data_already_exist'));
        }
        StudyPlanCard::updateOrCreate(
            ['id' => $request->id],
            [
                'class_type' => $request->class_type,
                'class_group' => $request->class_group,
                'semester' => $request->semester,
            ],
        );

        return redirect('study-plan-card')->with('success', __('common.data_saved'));
    }

    public function destroy($id)
    {
        $data = StudyPlanCard::find($id);
        if ($data) {
            $data->delete();
        }

        return response()->json(__('common.data_deleted'), 200);
    }

    public function data()
    {
        return Datatables::of(StudyPlanCard::query())
            ->addColumn('action', function ($data)
            {
                $prefix = '<a href="'.url('study-plan-card/'.$data->id.'/detail').'" class="btn btn-sm btn-primary">'. __('common.detail').'</a>';
                $url = url('study-plan-card');
                return view('components.action', compact('data', 'url', 'prefix'));
            })
            ->make(true);
    }

    public function detail(Request $request, $studyPlanCardId)
    {
        $studyPlanCard = StudyPlanCard::find($studyPlanCardId);
        if (!$studyPlanCard) {
            return abort(404);
        }
        $data = StudyPlanCardDetail::firstOrNew(['id' => $request->id]);
        $classType = $studyPlanCard->class_type;
        $classCoursesData = ClassCourse::with('course', 'lecturer')->whereHas('class', function ($q) use ($classType)
        {
            return $q->where('type', $classType);
        })->get();
        $classCourses = [];
        foreach ($classCoursesData as $value) {
            $classCourses[] = [
                'value' => $value->id,
                'text' => $value->publicName(),
            ];
        }
        $activeUrl = url('study-plan-card/'.$studyPlanCardId.'/detail');

        return view('admin.study-plan-card.detail', compact('data', 'studyPlanCard', 'classCourses', 'activeUrl'));
    }

    public function saveDetail(Request $request, $studyPlanCardId)
    {
        Validator::make($request->all(), [
            'class_course_id' => 'required',
            'day' => 'required',
            'start_time_schedule' => 'required',
            'end_time_schedule' => 'required',
        ])->validate();
        StudyPlanCardDetail::updateOrCreate(
            ['id' => $request->id],
            [
                'study_plan_card_id' => $studyPlanCardId,
                'class_course_id' => $request->class_course_id,
                'day' => $request->day,
                'start_time_schedule' => $request->start_time_schedule,
                'end_time_schedule' => $request->end_time_schedule,
            ]
        );

        return redirect('study-plan-card/'.$studyPlanCardId.'/detail')->with('success', __('common.data_saved'));
    }

    public function destroyDetail($studyPlanCardId, $id)
    {
        StudyPlanCardDetail::where(['id' => $id])->delete();

        return response()->json(__('common.data_deleted'), 200);
    }

    public function detailData($studyPlanCardId)
    {
        return Datatables::of(StudyPlanCardDetail::with('classCourse')->where('study_plan_card_id', $studyPlanCardId))
            ->addColumn('action', function ($data)
            {
                $url = url('study-plan-card/'.$data->study_plan_card_id.'/detail');

                return view('components.action', compact('data', 'url'));
            })
            ->addColumn('class_course_name', function ($data)
            {
                return $data->classCourse->publicName();
            })
            ->addColumn('day', function ($data)
            {
                return __('day.'.$data->day);
            })
            ->addColumn('start_time_schedule', function ($data)
            {
                return substr($data->start_time_schedule, 0, 5);
            })
            ->addColumn('end_time_schedule', function ($data)
            {
                return substr($data->end_time_schedule, 0, 5);
            })
            ->make(true);
    }
}
