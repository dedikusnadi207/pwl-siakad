<?php

namespace App\Http\Controllers\Lecturer;

use App\AcademicSupervisor;
use App\Colleger;
use App\CollegerStudyPlanCard;
use App\CollegerStudyPlanCardDetail;
use App\Constants\CollegerStudyPlanCardStatus;
use App\Http\Controllers\Controller;
use App\Period;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudyPlanCardController extends Controller
{
    public function index(Request $request)
    {
        $lecturer = Auth::user()->lecturer;
        $data = AcademicSupervisor::with('studyProgram')->where([
            'lecturer_id' => $lecturer->id,
            'is_active' => true,
        ])->get();
        $options = [];
        foreach ($data as $value) {
            $options[] = [
                'value' => $value->id,
                'text' => $value->publicName(),
            ];
        }
        $academicSupervisorId = $request->academic_supervisor_id;
        if ($academicSupervisorId && !in_array($academicSupervisorId, array_column($options, 'value'))) {
            return redirect('lct/study-plan-card');
        }
        $activeUrl = url('lct/study-plan-card');

        return view('lecturer.study-plan-card.index', compact('options', 'academicSupervisorId', 'activeUrl'));
    }

    public function data($academicSupervisorId)
    {
        $periodId = Period::where('is_active', true)->first()->id;
        $academicSupervisor = AcademicSupervisor::find($academicSupervisorId);
        $query = Colleger::leftJoin('colleger_study_plan_cards', 'colleger_study_plan_cards.colleger_id', '=', 'collegers.id')
            ->select('npm', 'name', 'semester', 'colleger_study_plan_cards.status', DB::raw('colleger_study_plan_cards.id as colleger_study_plan_card_id'))
            ->where([
                'period_id' => $periodId,
                'year' => $academicSupervisor->year,
                'class_type' => $academicSupervisor->class_type,
                'class_group' => $academicSupervisor->class_group,
                'study_program_id' => $academicSupervisor->study_program_id,
            ]);
        return Datatables::of($query)
            ->addColumn('action', function ($data)
            {
                return '<button type="button" class="btn-detail btn btn-sm btn-primary" value="'.$data->colleger_study_plan_card_id.'"> '.__('common.detail').' </button>';
            })
            ->addColumn('status', function ($data)
            {
                return CollegerStudyPlanCardStatus::generateBadge($data->status);
            })
            ->make(true);
    }

    public function collegerStudyPlanCardDetail($collegerStudyPlanCardId)
    {
        $collegerStudyPlanCardDetails = CollegerStudyPlanCardDetail::where('colleger_study_plan_card_id', $collegerStudyPlanCardId)->get();

        return view('lecturer.study-plan-card.detail', compact('collegerStudyPlanCardDetails'));
    }

    public function approval(Request $request, $collegerStudyPlanCardId)
    {
        $data = CollegerStudyPlanCard::find($collegerStudyPlanCardId);
        if (!$data) {
            return abort(404);
        }
        $countStatus = array_count_values($request->status);
        $status = CollegerStudyPlanCardStatus::REJECTED;
        if (isset($countStatus[CollegerStudyPlanCardStatus::APPROVED]) && isset($countStatus[CollegerStudyPlanCardStatus::REJECTED])) {
            $status = CollegerStudyPlanCardStatus::PARTIALLY_APPROVED;
        } elseif (isset($countStatus[CollegerStudyPlanCardStatus::APPROVED])) {
            $status = CollegerStudyPlanCardStatus::APPROVED;
        }

        DB::beginTransaction();
        foreach ($request->status as $key => $value) {
            if (!in_array($value, [CollegerStudyPlanCardStatus::APPROVED, CollegerStudyPlanCardStatus::REJECTED])) {
                return redirect('lct/study-plan-card')->with('errors', __('errors.invalid_status'));
            }
            CollegerStudyPlanCardDetail::where('id', $key)->update(['status' => $value]);
        }
        $data->status = $status;
        $data->save();
        DB::commit();

        return redirect('lct/study-plan-card')->with('success', __('common.data_saved'));
    }
}
