@extends('layouts.master')

@section('description')
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
@stop

@section('content')
	<div class="container-fluid"> 
		<div class="row">
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-4"></div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
				<img src="/images/icon.png" class="img-responsive"><br>
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-4"></div>
		</div> <!-- end row --> 
		
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				   <a href="/lorem-ipsum" class="btn btn-primary">Lorem Ipsum Generator</a>
   				<a href="/random-user" class="btn btn-primary">Random User Generator</a>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
		</div> <!-- end row --> 
	</div> <!-- end container-fluid -->
@stop


