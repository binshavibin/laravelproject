@extends('layouts.app')

@section('content')
@extends('alert')
	<form action="/todos/create" method="post">
		@csrf
		<label>Title</label>
		<input type="text" name="title">
		<label>Description</label>
		<textarea  name="description"></textarea>
		<input type="submit" name="submit" value="Create">
	</form>