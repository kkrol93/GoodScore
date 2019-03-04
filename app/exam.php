<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    protected $fillable=[
        'question','ans1','ans2','ans3','ans4','cans'
    ];
}
