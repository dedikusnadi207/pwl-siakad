<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property int $start_year
 * @property int $end_year
 * @property boolean $semester
 * @property boolean $is_active
 * @property string $created_at
 * @property string $updated_at
 * @property CollegerStudyPlanCard[] $collegerStudyPlanCards
 */
class Period extends Model
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
    protected $fillable = ['start_year', 'end_year', 'semester', 'is_active', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function collegerStudyPlanCards()
    {
        return $this->hasMany('App\CollegerStudyPlanCard');
    }

    public function publicName()
    {
        $evenOdd = $this->attributes['semester'] % 2 == 0 ? __('common.even') : __('common.odd');

        return $this->attributes['start_year'].'/'.$this->attributes['end_year'].' '.$evenOdd;
    }
}
