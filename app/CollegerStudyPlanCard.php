<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $colleger_id
 * @property integer $study_plan_card_id
 * @property integer $period_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Colleger $colleger
 * @property Period $period
 * @property StudyPlanCard $studyPlanCard
 * @property CollegerStudyPlanCardDetail[] $collegerStudyPlanCardDetails
 */
class CollegerStudyPlanCard extends Model
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
    protected $fillable = ['colleger_id', 'study_plan_card_id', 'period_id', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function colleger()
    {
        return $this->belongsTo('App\Colleger');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function period()
    {
        return $this->belongsTo('App\Period');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studyPlanCard()
    {
        return $this->belongsTo('App\StudyPlanCard');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collegerStudyPlanCardDetails()
    {
        return $this->hasMany('App\CollegerStudyPlanCardDetail');
    }
}
