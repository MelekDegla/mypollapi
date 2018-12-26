<?php

namespace App\Http\Controllers;

use App\Polls;
use Illuminate\Http\Request;
use App\Http\Resources\Polls as PollsResource;
use App\Polls as PollsModel;
use App\Answers as AnswersModel;

class PollsController extends Controller
{
    //
    public function index(){
        return PollsModel::all();
    }

    public function findbyid($id){

        return PollsModel::query()->findOrFail($id);
    }
    public function save(Request $request){

        return PollsModel::query()->create($request->all());
    }
    public function update($id,Request $request){
         PollsModel::query()->findOrFail($id)->update($request->all());
         return PollsModel::query()->findOrFail($id);
    }

}
