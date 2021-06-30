<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config\Constants;
use Illuminate\Support\Facades\DB;
use Config;
use App\User;
use App\Task;
use Session;
class BoardController extends Controller
{
    //
    public function index()
    {    
        $taskType  = Config::get('constants.langs');        
        $userlist = User::select(['id','name'])->get()->toArray();
        $user = array();
        foreach($userlist as $y=>$val) {
            $user[$val['id']] = $val['name'];
        }
        $data['userlist'] = $user;
        $data['taskType'] = ['1'=>'Story','2'=>'Task','3'=>'Issue'];
        $data['taskStatus'] = ['1'=>'todo','2'=>'Inprogress','3'=>'Done','4'=>'Closed'];
        $data['taskpriority'] = ['1'=>'High','2'=>'Medium','3'=>'Low'];
        $data['taskList'] =   Task::select()->where('project_id',Session::get('projectid', ''))->get()->toArray();   //print_r($data['taskList']);
        return view('board.index',$data);
    }

}
