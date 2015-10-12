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
	<form method="GET" action="#">
		<label>Number of Paragraphs:</label>
		<input maxlength=1 type="text" name="para_num" class="form-box">
		<br>
		<label>Paragraph length:</label>
		<select name="length" value="<?php echo isset($_GET['length']) ? $_GET['length'] : '' ?>" class="form-box">
			<option value="short">Short</option>
  			<option value="medium">Medium</option>
  			<option value="long">Long</option>
  			<option value="verylong">Very long</option>
		</select> 
		<br>
		<input type="submit" class="btn btn-primary submit" value="Generate Lorem Ipsum">
		<div class="output">
		    @if($text)
        	 	<div>{{ $text }}</div>
    		@else
         	<p>Your lorem ipsum will appear here!</p>
    		@endif
		</div>
	</form>
@stop

