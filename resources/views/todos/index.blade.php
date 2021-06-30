@extends('layouts.app')

@section('content')
	<h2>To Do List</h2>
	<h4><a href="/todos/create">Create New</a></h4>
<ul>
	@foreach($todos as $todo)
		<li>{{$todo->title}}
		<a href="/todos/edit/{{$todo->id}}">Edit</a></li>
	@endforeach
</ul>
{{ $todos->links() }}
