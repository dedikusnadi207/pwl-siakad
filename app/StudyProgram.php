<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $faculty_id
 * @property string $name
 * @property string $accreditation
 * @property string $created_at
 * @property string $updated_at
 * @property Faculty $faculty
 */
class StudyProgram extends Model
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
    protected $fillable = ['faculty_id', 'name', 'accreditation', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function faculty()
    {
        return $this->belongsTo('App\Faculty');
    }
}
