<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $study_program_id
 * @property string $nik
 * @property string $npm
 * @property string $name
 * @property string $email
 * @property string $telephone
 * @property string $address
 * @property string $npwp
 * @property string $birth_place
 * @property string $birth_date
 * @property string $photo
 * @property int $year
 * @property string $status
 * @property string $class_type
 * @property string $class_group
 * @property boolean $semester
 * @property string $created_at
 * @property string $updated_at
 * @property StudyProgram $studyProgram
 * @property User $user
 * @property CollegerStudyPlanCard[] $collegerStudyPlanCards
 */
class Colleger extends Model
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
    protected $fillable = ['user_id', 'study_program_id', 'nik', 'npm', 'name', 'email', 'telephone', 'address', 'npwp', 'birth_place', 'birth_date', 'photo', 'year', 'status', 'class_type', 'class_group', 'semester', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collegerStudyPlanCards()
    {
        return $this->hasMany('App\CollegerStudyPlanCard');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studyProgram()
    {
        return $this->belongsTo('App\StudyProgram');
    }
}
