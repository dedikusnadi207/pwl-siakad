<?php

namespace App\Http\Controllers\Colleger;

use App\CollegerStudyPlanCard;
use App\CollegerStudyPlanCardDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    public function index(Request $request)
    {
        $activeUrl = url('clg/grade');

        $subQuery = CollegerStudyPlanCardDetail::selectRaw('colleger_study_plan_card_id, SUM(sks) as sks_semester')
            ->join('study_plan_card_details', 'study_plan_card_details.id', '=', 'colleger_study_plan_card_details.study_plan_card_detail_id')
            ->join('class_courses', 'class_courses.id', '=', 'study_plan_card_details.class_course_id')
            ->join('courses', 'courses.id', '=', 'class_courses.course_id')
            ->groupBy('colleger_study_plan_card_id');
        $data = CollegerStudyPlanCard::joinSub($subQuery, 'sum_sks', function ($join)
        {
            $join->on('sum_sks.colleger_study_plan_card_id', '=', 'colleger_study_plan_cards.id');
        })->where('colleger_id', Auth::user()->colleger->id)->orderBy('id', 'DESC')->get();
        $sksTotal = 0;
        $ipTotal = 0;
        foreach ($data as &$value) {
            $sksTotal += $value['sks_semester'];
            $ipSemester = $value->collegerStudyPlanCardDetails->avg('index_grade');
            $ipTotal += $ipSemester;
            $value['ip_semester'] = $ipSemester;
            $value['ip_kumulatif'] = $ipTotal;
            $value['sks_kumulatif'] = $sksTotal;
        }

        return view('colleger.grade.index', compact('activeUrl', 'data'));
    }

    public function detail($collegerStudyPlanCardId)
    {
        $collegerStudyPlanCardDetails = CollegerStudyPlanCardDetail::where('colleger_study_plan_card_id', $collegerStudyPlanCardId)->get();

        return view('colleger.grade.detail', compact('collegerStudyPlanCardDetails'));
    }

    // public function data()
    // {
    //     $subQuery = CollegerStudyPlanCardDetail::selectRaw('colleger_study_plan_card_id, SUM(sks) as sks_semester')
    //         ->join('study_plan_card_details', 'study_plan_card_details.id', '=', 'colleger_study_plan_card_details.study_plan_card_detail_id')
    //         ->join('class_courses', 'class_courses.id', '=', 'study_plan_card_details.class_course_id')
    //         ->join('courses', 'courses.id', '=', 'class_courses.course_id')
    //         ->groupBy('colleger_study_plan_card_id');
    //     $query = CollegerStudyPlanCard::joinSub($subQuery, 'sum_sks', function ($join)
    //     {
    //         $join->on('sum_sks.colleger_study_plan_card_id', '=', 'colleger_study_plan_cards.id');
    //     })->where('colleger_id', Auth::user()->colleger->id)->orderBy('id', 'DESC');

    //     return Datatables::of($query)
    //         ->addColumn('period', function ($data)
    //         {
    //             return $data->period->publicName();
    //         })
    //         ->addColumn('ip_semester', function ($data)
    //         {
    //             return $data->collegerStudyPlanCardDetails->avg('index_grade');
    //         })
    //         ->addColumn('action', function ($data)
    //         {
    //             return $data->collegerStudyPlanCardDetails->avg('index_grade');
    //         })
    //         ->make(true);
    // }
}
