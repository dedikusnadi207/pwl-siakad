<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $class_id
 * @property integer $course_id
 * @property integer $lecturer_id
 * @property string $day
 * @property string $start_time_schedule
 * @property string $end_time_schedule
 * @property string $created_at
 * @property string $updated_at
 * @property Class $class
 * @property Course $course
 * @property Lecturer $lecturer
 * @property StudyPlanCardDetail[] $studyPlanCardDetails
 */
class ClassCourse extends Model
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
    protected $fillable = ['class_id', 'course_id', 'lecturer_id', 'day', 'start_time_schedule', 'end_time_schedule', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class()
    {
        return $this->belongsTo('App\Class');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lecturer()
    {
        return $this->belongsTo('App\Lecturer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studyPlanCardDetails()
    {
        return $this->hasMany('App\StudyPlanCardDetail');
    }
}
