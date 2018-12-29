<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answers as AnswersModel;

class AnswersController extends Controller
{
    //
    public function vote($id){
        $answer = AnswersModel::query()->findOrFail($id);
        $answer->update(['votes'=> AnswersModel::query()->findOrFail($id)->votes + 1]);
        return AnswersModel::query()->findOrFail($id);
    }
    public function save(Request $request){
        return AnswersModel::query()->create($request->all());
    }
}
