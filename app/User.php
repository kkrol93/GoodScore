<?php

namespace App;

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
        'name', 'email', 'password', 'surname', 'pos', 'quiz', 'sales',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = [
        'quizpkt',
        'salespkt',
        'total',
    ];

    public function getQuizpktAttribute()
    {
        return round($this->quiz / 30 * 80);
    }

    public function getSalespktAttribute()
    {
        return round($this->sales / 100 * 120);
    }

    public function getTotalAttribute()
    {
        return $this->quizpkt + $this->salespkt;
    }
    
}
