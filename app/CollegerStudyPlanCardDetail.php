<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $colleger_study_plan_card_id
 * @property integer $study_plan_card_detail_id
 * @property float $grade
 * @property string $index
 * @property float $index_grade
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property CollegerStudyPlanCard $collegerStudyPlanCard
 * @property StudyPlanCardDetail $studyPlanCardDetail
 */
class CollegerStudyPlanCardDetail extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['colleger_study_plan_card_id', 'study_plan_card_detail_id', 'grade', 'index', 'index_grade', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function collegerStudyPlanCard()
    {
        return $this->belongsTo('App\CollegerStudyPlanCard');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studyPlanCardDetail()
    {
        return $this->belongsTo('App\StudyPlanCardDetail');
    }
}
