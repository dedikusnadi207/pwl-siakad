<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $lecturer_id
 * @property integer $study_program_id
 * @property int $year
 * @property string $class_type
 * @property string $class_group
 * @property boolean $is_active
 * @property string $created_at
 * @property string $updated_at
 * @property Lecturer $lecturer
 * @property StudyProgram $studyProgram
 */
class AcademicSupervisor extends Model
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
    protected $fillable = ['lecturer_id', 'study_program_id', 'year', 'class_type', 'class_group', 'is_active', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lecturer()
    {
        return $this->belongsTo('App\Lecturer');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studyProgram()
    {
        return $this->belongsTo('App\StudyProgram');
    }

    public function publicName()
    {
        return $this->attributes['year'].' - '.$this->attributes['class_type'].$this->attributes['class_group'].' - '.$this->studyProgram->name;
    }
}
