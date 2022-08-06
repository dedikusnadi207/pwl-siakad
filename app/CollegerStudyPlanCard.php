<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $colleger_id
 * @property integer $study_plan_card_id
 * @property int $year
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Colleger $colleger
 * @property StudyPlanCard $studyPlanCard
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
    protected $fillable = ['colleger_id', 'study_plan_card_id', 'year', 'status', 'created_at', 'updated_at'];

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
    public function studyPlanCard()
    {
        return $this->belongsTo('App\StudyPlanCard');
    }
}
