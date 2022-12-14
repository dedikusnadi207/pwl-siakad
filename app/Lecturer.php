<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $nik
 * @property string $name
 * @property string $email
 * @property string $title
 * @property string $telephone
 * @property string $photo
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property AcademicSupervisor[] $academicSupervisors
 * @property ClassCourse[] $classCourses
 */
class Lecturer extends Model
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
    protected $fillable = ['user_id', 'nik', 'name', 'email', 'title', 'telephone', 'photo', 'created_at', 'updated_at'];

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
    public function academicSupervisors()
    {
        return $this->hasMany('App\AcademicSupervisor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function classCourses()
    {
        return $this->hasMany('App\ClassCourse');
    }

    public function publicName()
    {
        return $this->attributes['name'].' '.$this->attributes['title'];
    }
}
