<?php

namespace App\Http\Controllers\Colleger;

use App\CollegerStudyPlanCard;
use App\CollegerStudyPlanCardDetail;
use App\Constants\CollegerStudyPlanCardStatus;
use App\Http\Controllers\Controller;
use App\Period;
use App\StudyPlanCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudyPlanCardController extends Controller
{
    public function index(Request $request)
    {
        $activeUrl = url('clg/study-plan-card');
        $colleger = Auth::user()->colleger;
        $period = Period::where('start_year', '>=', $colleger->year)
            ->where('is_active', true)
            ->first();
        $submitted = CollegerStudyPlanCard::with('collegerStudyPlanCardDetails')->where([
            'period_id' => $period->id,
            'colleger_id' => $colleger->id,
        ])->first();
        $submittedDetail = [];
        if ($submitted) {
            $submittedDetail = $submitted->collegerStudyPlanCardDetails->pluck('status', 'study_plan_card_detail_id');
        }
        $studyPlanCard = StudyPlanCard::with([
            'studyPlanCardDetails.classCourse.class',
            'studyPlanCardDetails.classCourse.course',
        ])->where([
            'class_type' => $colleger->class_type,
            'class_group' => $colleger->class_group,
            'semester' => $colleger->semester,
        ])->first();
        if (!$studyPlanCard) {
            return view('colleger.study-plan-card.index')->with('errors', __('errors.study_plan_card_not_available'));
        }

        return view('colleger.study-plan-card.index', compact('activeUrl', 'studyPlanCard', 'submitted', 'submittedDetail'));
    }

    public function save(Request $request)
    {
        $studyPlanCardDetailIds = array_keys($request->study_plan_card_details);
        $colleger = Auth::user()->colleger;
        $period = Period::where('start_year', '>=', $colleger->year)
            ->where('is_active', true)
            ->first();
        DB::beginTransaction();
        $collegerStudyPlanCard = CollegerStudyPlanCard::firstOrNew([
            'period_id' => $period->id,
            'colleger_id' => $colleger->id,
            'study_plan_card_id' => $request->study_plan_card_id,
        ]);
        $collegerStudyPlanCard->status = CollegerStudyPlanCardStatus::WAITING_APPROVAL;
        $collegerStudyPlanCard->save();

        foreach ($studyPlanCardDetailIds as $value) {
            CollegerStudyPlanCardDetail::updateOrCreate([
                'colleger_study_plan_card_id' => $collegerStudyPlanCard->id,
                'study_plan_card_detail_id' => $value,
                'status' => CollegerStudyPlanCardStatus::WAITING_APPROVAL,
            ]);
        }
        DB::commit();

        return redirect('clg/study-plan-card')->with('success', __('common.data_saved'));
    }

    public function deleteDetail($parentId, $id)
    {
        $data = CollegerStudyPlanCardDetail::where([
            'colleger_study_plan_card_id' => $parentId,
            'study_plan_card_detail_id' => $id,
        ])->first();
        if ($data) {
            $data->delete();

            return response()->json(__('common.data_deleted'), 200);
        } else {
            return response()->json(__('errors.data_not_found'), 200);
        }
    }
}
