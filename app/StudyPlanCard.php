<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $colleger_id
 * @property boolean $semester
 * @property int $year
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 * @property Colleger $colleger
 * @property StudyPlanCardDetail[] $studyPlanCardDetails
 */
class StudyPlanCard extends Model
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
    protected $fillable = ['colleger_id', 'semester', 'year', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function colleger()
    {
        return $this->belongsTo('App\Colleger');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function studyPlanCardDetails()
    {
        return $this->hasMany('App\StudyPlanCardDetail');
    }
}
