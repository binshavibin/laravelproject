<?php

namespace App\Http\Controllers;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\DB;
use App\Task;
use Session;

class TaskController extends Controller
{
    public function create(TaskRequest $request)
    {
        //insert Todo Data
        $validated = $request->validated(); 
        $validated['created_by'] = 1;
         $validated['assign_to'] = 1;
         $validated['project_id'] = Session::get('projectid', '');
       // print_r($validated);die();
        if($validated) {
            DB::table('task')->insert($validated);
             return redirect('/board/'.Session::get('project', ''));
        }
    }

    public function changeStatus($id,$status )
    {
       
        $taskStatusArr = ['1'=>'todo','2'=>'Inprogress','3'=>'Done','4'=>'Closed'];

        $task = Task::find($id); print_r($task);
        $task->update(['status'=>array_search($status, $taskStatusArr)]);
        $task = Task::find($id);
        $task->status = array_search($status, $taskStatusArr);
        $task->save();
        echo 'success';
        //echo 'dddddddddd';die();
    }
}
