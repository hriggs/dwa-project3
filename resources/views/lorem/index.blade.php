@extends('layouts.master')

@section('title')
	Lorem Ipsum Generator
@stop

@section('subheading')
	Lorem Ipsum Generator
@stop

@section('description')
	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
@stop

@section('content')
	<form>
		<label>Number of Paragraphs:</label>
		<input maxlength=1 type="text" name="para_num">
		<br>
		<input type="submit" class="btn btn-primary" value="Generate Lorem Ipsum">
	</form>
@stop

