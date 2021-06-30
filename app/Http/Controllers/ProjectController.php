<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use Illuminate\Support\Facades\DB;
use App\Project;
use Session;
class ProjectController extends Controller
{
    public function index()
    {  
        $data = Session::all(); 
        $allList = DB::table('project')->where('status','1')->orderBy('id','desc')->paginate(10); 
        return view('project.index')->with(['projects'=>$allList]);
    }

    public function create()
    {
        $data['ownerlist'] = DB::table('users')->get();  
        return view('project.create',$data);
    }

    public function store(ProjectRequest $request)
    {
        //insert Todo Data
        $validated = $request->validated();  //print_r($request);die();
        if($validated) {
            DB::table('project')->insert($validated);
             return redirect('/projects');
        }
    

    }
      public function update(ProjectRequest $request,Project $project)
    {
        
        //update to do data
        //dd($request->title);
        $project->update(['title'=>$request->title,'description'=>$request->description,'percentage'=>$request->percentage,'deadline'=>$request->deadline,'project_owner'=>$request->project_owner,'shortcode'=>$request->shortcode]);
        //return redirect()->back()->with('message','Updated');
        return redirect('/projects');
        
    }
    public function editproject(Project $project)
    {   
       $data['ownerlist'] = DB::table('users')->get();
       $data['project']  =  $project; 
       return view('project.update',$data);
        
    }

    public function delete(Project $project)
    {
         $project->update(['status'=>0]);
         return redirect('/projects');
    }

    public function rapidView($shortcode,$projectid)
    {
        Session::put('project', $shortcode);
        Session::put('projectid', $projectid);
        return redirect('/board/'.$shortcode);
        
    }
}
