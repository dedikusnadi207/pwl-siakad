<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $study_plan_card_id
 * @property integer $class_course_id
 * @property float $grade
 * @property string $index
 * @property float $index_grade
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
    protected $fillable = ['study_plan_card_id', 'class_course_id', 'grade', 'index', 'index_grade', 'created_at', 'updated_at'];

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
}
