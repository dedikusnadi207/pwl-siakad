<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $study_plan_card_id
 * @property integer $class_course_id
 * @property string $day
 * @property string $start_time_schedule
 * @property string $end_time_schedule
 * @property string $created_at
 * @property string $updated_at
 * @property ClassCourse $classCourse
 * @property StudyPlanCard $studyPlanCard
 */
class StudyPlanCardDetail extends Model
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
    protected $fillable = ['study_plan_card_id', 'class_course_id', 'day', 'start_time_schedule', 'end_time_schedule', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classCourse()
    {
        return $this->belongsTo('App\ClassCourse');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studyPlanCard()
    {
        return $this->belongsTo('App\StudyPlanCard');
    }

    public function publicSchedule()
    {
        return __('day.'.$this->attributes['day']).', '.substr($this->attributes['start_time_schedule'], 0, 5).' - '.substr($this->attributes['end_time_schedule'], 0, 5);
    }
}
