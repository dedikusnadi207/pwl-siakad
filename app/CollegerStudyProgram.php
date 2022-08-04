<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $colleger_id
 * @property integer $study_program_id
 * @property string $session_group
 * @property string $created_at
 * @property string $updated_at
 * @property Colleger $colleger
 * @property StudyProgram $studyProgram
 */
class CollegerStudyProgram extends Model
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
    protected $fillable = ['colleger_id', 'study_program_id', 'session_group', 'created_at', 'updated_at'];

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
    public function studyProgram()
    {
        return $this->belongsTo('App\StudyProgram');
    }
}
