<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Polls extends Model
{
    //
    protected $fillable=['user_id','question','activated'];
}
