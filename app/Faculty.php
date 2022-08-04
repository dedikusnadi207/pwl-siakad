<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $short_name
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 * @property StudyProgram[] $studyPrograms
 */
class Faculty extends Model
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
    protected $fillable = ['short_name', 'name', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studyPrograms()
    {
        return $this->hasMany('App\StudyProgram');
    }
}
