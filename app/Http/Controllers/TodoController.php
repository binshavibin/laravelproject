<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\DB;
use App\Todo;
class TodoController extends Controller
{
    //
    public function index()
    {
    	$allList = DB::table('todos')->paginate(3); // DB::table('todos')->get(); ;
    	return view('todos.index')->with(['todos'=>$allList]);
    }
    public function create()
    {
    	return view('todos.create');
    }
    public function edit(Todo $todo)
    {
    	
    	return view('todos.update',compact('todo'));
    	
    }
    public function update(TodoRequest $request,Todo $todo)
    {
    	
    	//update to do data
    	//dd($request->title);
    	$todo->update(['title'=>$request->title,'description'=>$request->description]);
    	//return redirect()->back()->with('message','Updated');
    	return redirect('/todos');
    	
    }
    public function store(TodoRequest $request)
    {
    	//insert Todo Data
    	$validated = $request->validated();
    	if($validated) {
    		DB::table('todos')->insert($validated);
    		 return redirect('/todos');
    	}
    

    }
}
