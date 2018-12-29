<?php

namespace App\Http\Controllers;

use App\Answers;
use App\Polls;
use Illuminate\Http\JsonResponse;
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

        return new PollsResource(PollsModel::query()->findOrFail($id));
    }
    public function save(Request $request){

        return PollsModel::query()->create($request->all());
    }
    public function update($id,Request $request){
         PollsModel::query()->findOrFail($id)->update($request->all());
         return PollsModel::query()->findOrFail($id);
    }

    public function activate($id){
        $poll = PollsModel::query()->findOrFail($id);
        $polld = PollsModel::query()->select('*')->where('activated','=',true);
        $polld->update(['activated'=>false]);
        $poll->update(['activated'=>true]);
        return PollsModel::query()->findOrFail($id);
    }

    public function pollWithAnswers($id){
        $obj = new \stdClass();
        $objAns = new \stdClass();
        $answer=AnswersModel::query()->select('*')->where('id_poll','=',$id);
        $answers = json_decode($answer,true);
        foreach ($answer as $an){
            $objAns->id=$an->id;
            $objAns->label=$an->label;
            $answers[]=$objAns;
            $obj->test="test";
        }
        $poll = PollsModel::findOrFail($id);
        $obj->id = $poll->id;
        $obj->user_id = $poll->user_id;
        $obj->activated = $poll->activated;
        $obj->answers = $answer;

        return json_encode($obj);
    }

    public function getPollByUserId($id){
        return new PollsResource(PollsModel::whereUser_idAndActivated($id,true)
            ->first());
    }

    public function savePollWithAnswers(Request $request){
        $pollAns = PollsModel::query()->create($request->all())->get()->last();
        $answers= $request->answers;
        foreach ($answers as $answer){
            $answer['polls_id']=$pollAns->id;
            AnswersModel::query()->create($answer);
        }
        return $answers;
    }

    public function getPollsByUserId($id){
        return PollsModel::whereUser_id($id)->get();
    }
}
