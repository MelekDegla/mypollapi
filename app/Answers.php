<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    //
    protected $fillable = ['polls_id','label','votes'];


}
