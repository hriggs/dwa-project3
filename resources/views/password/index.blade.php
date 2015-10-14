@extends('layouts.master')

@section('title')
	xkcd Password Generator
@stop

@section('subheading')
	xkcd Password Generator
@stop

@section('description')
	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
@stop

@section('content')
	<form method="POST" action="/password">
	<input type='hidden' name='_token' value='{{ csrf_token() }}'>
		<label>Number of Words:</label>
			<div class="br">
				<br>
			</div>
		<input maxlength=1 type="text" name="word_num" class="form-box">
		<br>
		<label>Number of Numbers:</label>
		<div class="br">
			<br>
		</div>
		<input maxlength=1 type="text" name="number_num" class="form-box">
		<br>
		<label>Number Location:</label>
		<div class="br">
			<br>
		</div>
		<input type="radio" name="number_loc" value="end">At End 
		<input type="radio" name="number_loc" value="random">Random
		<br>
		<label>Number of Symbols:</label>
		<div class="br">
			<br>
		</div>
		<input maxlength=1 type="text" name="symbol_num" class="form-box">
		<br>
		<label>Symbol Location:</label>
		<div class="br">
			<br>
		</div>
		<input type="radio" name="symbol_loc" value="end">At End 
		<input type="radio" name="symbol_loc" value="random">Random
		<br>
		<label>Separate Words with:</label>
		<div class="br">
			<br>
		</div>
		<select name="separator" class="form-box">
			<option value="hyphens">Hyphens</option>
  			<option value="spaces">Spaces</option>
  			<option value="nospace">No Characters</option>
		</select> 
		<br>
		<label>Word Cases:</label>
		<div class="br">
			<br>
		</div>
		<select name="cases" class="form-box">
			<option value="start">First Letter Capitalized</option>
  			<option value="upper">All Upper Case</option>
  			<option value="lower">All Lower Case</option>
		</select> 
		<br>
		<input type="submit" class="btn btn-primary submit" value="Generate Password">
	</form>
	<div class="output">
	password here
	</div>
@stop