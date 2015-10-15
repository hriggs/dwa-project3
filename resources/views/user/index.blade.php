@extends('layouts.master')

@section('title')
	Random User Generator
@stop

@section('subheading')
	Random User Generator
@stop

@section('description')
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
@stop

@section('content')
	<form method="POST" action="/random-user">
		<input type='hidden' name='_token' value='{{ csrf_token() }}'>
		<label>Number of Users:</label>
		<input maxlength=1 type="text" name="users" class="form-box" required>
		<br>
		<p class="include">Optional Includes:</p>
		<input type="checkbox" name="address"> Address
		<br>
		<input type="checkbox" name="phoneNumber"> Phone Number
		<br>
		<input type="checkbox" name="freeEmail"> E-mail
		<br>
		<input type="checkbox" name="birthday"> Birthday
		<br>
		<input type="checkbox" name="text"> Profile Blurb
		<br>
		<input type="submit" class="btn btn-primary submit" value="Generate Random Users">
	</form>
	<div class="output">
   	<?php echo $text; ?>
	</div>
@stop

