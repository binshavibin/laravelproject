<?php

namespace App\Http\Controllers;

use App\Http\Requests\SprintRequest;
use Illuminate\Support\Facades\DB;
use App\Sprint;
use Session;
class SprintController extends Controller
{
    public function index()
    {  
        $data = Session::all(); 
        $allList = DB::table('sprint')->orderBy('id','desc')->paginate(10); 
        return view('sprint.index')->with(['sprints'=>$allList]);
    }
     public function create()
    {
       
        return view('sprint.create');
    }
    public function store(SprintRequest $request)
    {
       //print_r($request);die();
        
        //insert Todo Data
        $validated = $request->validated();  
        if($validated) {
            $validated['project_id'] = Session::get('projectid', '');
            DB::table('sprint')->insert($validated);
            return redirect('/sprints');
        }
    

    }
}
