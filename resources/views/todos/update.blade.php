@extends('layouts.app')

@section('content')
	
	@extends('alert')
	<form action="{{route('todo.update',['todo'=>$todo->id])}}" method="post">
		@csrf
		@method('patch')
		<label>Title</label>
		<input type="text" name="title" value="{{$todo->title}}">
		<label>Description</label>
		<textarea  name="description">{{$todo->description}}</textarea>
		<input type="submit" name="submit" value="Update">
	</form>
