@extends('layouts.master')

@section('title')
	Random User Generator
@stop

@section('subheading')
	Random User Generator
@stop

@section('description')
	<p>Generate random user data!<br>*User number must be between 1 and 9.*</p>
@stop

@section('content')
	<form method="POST" action="/random-user">
		<input type='hidden' name='_token' value='{{ csrf_token() }}'>
		<label>Number of Users:</label>
		<input maxlength=1 type="text" name="users" class="form-box" value="{{ $data['users'] }}" required>
		@if($errors->get('users'))
    		<ul>
        	@foreach($errors->get('users') as $error)
         	<li><span class="error">{{ $error }}</span></li>
        	@endforeach
    		</ul>
		@endif
		<br>
		<p class="include">Optional Includes:</p>
		<input type="checkbox" name="address" {{ $data['address'] }}> Address
		<br>
		<input type="checkbox" name="phoneNumber" {{ $data['phoneNumber'] }}> Phone Number
		<br>
		<input type="checkbox" name="freeEmail" {{ $data['freeEmail'] }}> E-mail
		<br>
		<input type="checkbox" name="birthday" {{ $data['birthday'] }}> Birthday
		<br>
		<input type="checkbox" name="text" {{ $data['text'] }}> Profile Blurb
		<br>
		<input type="submit" class="btn btn-primary submit" value="Generate Random Users">
	</form>
	<div class="output">
   	<?php echo $text; ?>
	</div>
@stop

