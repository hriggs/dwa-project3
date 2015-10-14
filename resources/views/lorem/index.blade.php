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
	<form method="POST" action="/lorem-ipsum">
		<input type='hidden' name='_token' value='{{ csrf_token() }}'>
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
		<p class="include">Optional Includes:</p>
		<input type="checkbox" name="headers" value="headers"> Headers
		<br>
		<input type="checkbox" name="unordered" value="unordered"> Unordered Lists 
		<br>
		<input type="checkbox" name="ordered" value="ordered"> Ordered Lists
		<br>
		<input type="checkbox" name="descript" value="descript"> Description Lists
		<br>
		<input type="checkbox" name="quote" value="quote"> Block Quotes
		<br>
		<input type="checkbox" name="code" value="code"> Code Samples
		<br>
		<input type="checkbox" name="bold" value="bold"> Bold and Italic Text
		<br>
		<input type="checkbox" name="links" value="links"> Links
		<br>
		<input type="checkbox" name="caps" value="caps"> All Caps
		<br>
		<input type="submit" class="btn btn-primary submit" value="Generate Lorem Ipsum">
		<div class="output">
		    @if($text)
        	 	<?php eval("echo $text"); ?>
    		@else
         	<p>Your lorem ipsum will appear here!</p>
    		@endif
		</div>
	</form>
@stop

