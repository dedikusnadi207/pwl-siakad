<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $lecturer_id
 * @property int $year
 * @property string $class_type
 * @property string $created_at
 * @property string $updated_at
 * @property Lecturer $lecturer
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
    protected $fillable = ['lecturer_id', 'year', 'class_type', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lecturer()
    {
        return $this->belongsTo('App\Lecturer');
    }
}
