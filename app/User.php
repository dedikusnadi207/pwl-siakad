<?php

namespace App;

use App\Constants\UserType;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->attributes['user_type'] == UserType::ADMIN;
    }

    public function isColleger()
    {
        return $this->attributes['user_type'] == UserType::COLLEGER;
    }

    public function isLecturer()
    {
        return $this->attributes['user_type'] == UserType::LECTURER;
    }

    public function colleger()
    {
        return $this->hasOne('App\Colleger');
    }

    public function lecturer()
    {
        return $this->hasOne('App\Lecturer');
    }

    public function detail()
    {
        if ($this->isColleger()) {
            return $this->colleger;
        } elseif ($this->isLecturer()) {
            return $this->lecturer;
        }

        return null;
    }

    public function publicPhoto()
    {
        $result = asset('template/img/avatars/1.png');
        if ($this->isColleger() && !empty($this->colleger->photo ?? null)) {
            $result = url($this->colleger->photo);
        } elseif ($this->isLecturer() && !empty($this->lecturer->photo ?? null)) {
            $result = url($this->lecturer->photo);
        }

        return $result;
    }

    public function publicUserType()
    {
        return __('common.'.$this->attributes['user_type']);
    }
}
