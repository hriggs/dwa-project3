@extends('layouts.master')

@section('title')
	Lorem Ipsum Generator
@stop

@section('subheading')
	Lorem Ipsum Generator
@stop

@section('description')
	<p>Generate lorem ipsum text!<br>*Paragraph number must be between 1 and 9.*</p>
@stop

@section('content')
	<form method="POST" action="/lorem-ipsum">
		<input type='hidden' name='_token' value='{{ csrf_token() }}'>
		<label>Number of Paragraphs:</label>
		<input maxlength=1 type="text" name="para" class="form-box" value="{{ $data['para'] }}" required>
		@if($errors->get('para'))
    		<ul>
        	@foreach($errors->get('para') as $error)
         	<li><span class="error">{{ $error }}</span></li>
        	@endforeach
    		</ul>
		@endif
		<br>
		<label>Paragraph length:</label>
		<select name="length" class="form-box">
			<option name="short" value="short" {{ $data['short'] }}>Short</option>
  			<option name="medium" value="medium" {{ $data['medium'] }}>Medium</option>
  			<option name="long" value="long" {{ $data['long'] }}>Long</option>
  			<option name="verylong" value="verylong" {{ $data['verylong'] }}>Very long</option>
		</select> 
		<br>
		<p class="include">Optional Includes:</p>
		<input type="checkbox" name="headers" {{ $data['headers'] }}> Headers
		<br>
		<input type="checkbox" name="ul" {{ $data['ul'] }}> Unordered Lists 
		<br>
		<input type="checkbox" name="ol" {{ $data['ol'] }}> Ordered Lists
		<br>
		<input type="checkbox" name="dl" {{ $data['dl'] }}> Description Lists
		<br>
		<input type="checkbox" name="bq" {{ $data['bq'] }}> Block Quotes
		<br>
		<input type="checkbox" name="code" {{ $data['code'] }}> Code Samples
		<br>
		<input type="checkbox" name="decorate" {{ $data['decorate'] }}> Bold and Italic Text
		<br>
		<input type="checkbox" name="link" {{ $data['link'] }}> Links
		<br>
		<input type="checkbox" name="allcaps" {{ $data['allcaps'] }}> All Caps
		<br>
		<input type="submit" class="btn btn-primary submit" value="Generate Lorem Ipsum">
		<div class="output">
      	{!! $output !!}
		</div>
	</form>
@stop