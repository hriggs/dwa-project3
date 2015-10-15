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
		<input maxlength=1 type="text" name="para" class="form-box" required>
		<br>
		<label>Paragraph length:</label>
		<select name="length" class="form-box">
			<option name="short" value="short">Short</option>
  			<option name="medium" value="medium">Medium</option>
  			<option name="long" value="long">Long</option>
  			<option name="verylong" value="verylong">Very long</option>
		</select> 
		<br>
		<p class="include">Optional Includes:</p>
		<input type="checkbox" name="headers"> Headers
		<br>
		<input type="checkbox" name="ul"> Unordered Lists 
		<br>
		<input type="checkbox" name="ol"> Ordered Lists
		<br>
		<input type="checkbox" name="dl"> Description Lists
		<br>
		<input type="checkbox" name="bq"> Block Quotes
		<br>
		<input type="checkbox" name="code"> Code Samples
		<br>
		<input type="checkbox" name="decorate"> Bold and Italic Text
		<br>
		<input type="checkbox" name="link"> Links
		<br>
		<input type="checkbox" name="allcaps"> All Caps
		<br>
		<input type="submit" class="btn btn-primary submit" value="Generate Lorem Ipsum">
		<div class="output">
      	<?php echo $text; ?>
		</div>
	</form>
@stop

