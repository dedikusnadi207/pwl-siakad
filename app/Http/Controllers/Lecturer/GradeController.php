<?php

namespace App\Http\Controllers\Lecturer;

use App\CollegerStudyPlanCardDetail;
use App\Http\Controllers\Controller;
use App\Period;
use App\StudyPlanCardDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Datatables;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    public function index(Request $request)
    {
        $lecturerId = Auth::user()->lecturer->id;
        $activeUrl = url('lct/grade');
        $periods = [];
        foreach (Period::orderBy('start_year', 'DESC')->orderBy('semester', 'DESC')->get() as $value) {
            $periods[] = ['value' => $value->id, 'text' => $value->publicName()];
        }
        $periodId = $request->period_id;
        $detailId = $request->detail_id;
        $detailOptions = [];
        if ($periodId) {
            $studyPlanCardDetails = StudyPlanCardDetail::select('id', 'class_course_id', 'study_plan_card_id')->with(['classCourse.class', 'classCourse.course', 'studyPlanCard'])->whereHas('studyPlanCard.collegerStudyPlanCards', function ($q) use ($periodId)
            {
                $q->where('period_id', $periodId);
            })->whereHas('classCourse', function ($q) use ($lecturerId)
            {
                $q->where('lecturer_id', $lecturerId);
            })->get();
            foreach ($studyPlanCardDetails as $value) {
                $detailOptions[] = ['value' => $value->id, 'text' => $value->publicClass().' - '.__('common.semester').' '.$value->studyPlanCard->semester.' - '.$value->classCourse->course->name];
            }
        }

        return view('lecturer.grade.index', compact('activeUrl', 'periods', 'periodId', 'detailOptions', 'detailId'));
    }

    public function data($periodId, $detailId)
    {
        $query = CollegerStudyPlanCardDetail::with('collegerStudyPlanCard.colleger')
            ->where('study_plan_card_detail_id', $detailId)
            ->whereHas('collegerStudyPlanCard', function ($q) use ($periodId)
            {
                $q->where('period_id', $periodId);
            });

        return Datatables::of($query)
            ->addColumn('grade', function ($data)
            {
                return '<input id="grade'.$data->colleger_id.'" max="100" min="0" type="number" class="form-control input-grade" input-grade-id="'.$data->colleger_id.'" name="grade['.$data->colleger_id.']" value="'.$data->grade.'">';
            })
            ->addColumn('index', function ($data)
            {
                $index = '';
                if (!is_null($grade = $data->grade)) {
                    list($index) = $this->convertGrade($grade);
                }
                return '<span id="index'.$data->colleger_id.'">'.$index.'</span>';
            })
            ->addColumn('index_grade', function ($data)
            {
                $indexGrade = '';
                if (!is_null($grade = $data->grade)) {
                    list($index, $indexGrade) = $this->convertGrade($grade);
                }
                return '<span id="indexGrade'.$data->colleger_id.'">'.$indexGrade.'</span>';
            })
            ->make(true);
    }

    public function save(Request $request, $periodId, $detailId)
    {
        DB::beginTransaction();
        foreach ($request->grade as $collegerId => $value) {
            list($index, $indexGrade) = $this->convertGrade($value);
            CollegerStudyPlanCardDetail::whereHas('collegerStudyPlanCard', function ($q) use ($periodId, $collegerId)
            {
                $q->where('period_id', $periodId)->where('colleger_id', $collegerId);
            })->where('study_plan_card_detail_id', $detailId)->update([
                'grade' => $value,
                'index' => $index,
                'index_grade' => $indexGrade,
            ]);
        }
        DB::commit();

        return redirect('lct/grade')->with('success', __('common.data_saved'));
    }

    private function convertGrade($grade)
    {
        if ($grade >= 85) {
            return ['A', 4.00];
        } elseif ($grade >= 80) {
            return ['A-', 3.75];
        } elseif ($grade >= 75) {
            return ['B+', 3.25];
        } elseif ($grade >= 70) {
            return ['B', 3.00];
        } elseif ($grade >= 65) {
            return ['B-', 2.75];
        } elseif ($grade >= 60) {
            return ['C+', 2.25];
        } elseif ($grade >= 55) {
            return ['C', 2.00];
        } elseif ($grade >= 50) {
            return ['C-', 1.75];
        } elseif ($grade >= 40) {
            return ['D', 1.00];
        } else {
            return ['E', 0];
        }
    }
}
