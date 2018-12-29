<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\User as UserModel;

class UserController extends Controller
{
    //

    public function getActivated($id){
        return  new UserResource(UserModel::query()->where('id','=',$id)->get());
    }
}
