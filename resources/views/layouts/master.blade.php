<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to "Developer's Best Friend" --}}
        @yield("title","Developer's Best Friend")
    </title>

    <meta charset="utf-8">
    <link href="/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="/css/styles.css" type="text/css" rel="stylesheet">

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield("head")
</head>
<body>
	<div class="container-fluid"> 
		<div class="row">
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 content">
				<h1>Developer's Best Friend</h1>
				
				<!-- Static navbar -->
      		<nav class="navbar navbar-default">
        			<div class="container-fluid">
          			<div class="navbar-header">
            			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              				<span class="sr-only">Toggle navigation</span>
              				<span class="icon-bar"></span>
              				<span class="icon-bar"></span>
              				<span class="icon-bar"></span>
            			</button>
            			<a class="navbar-brand" href="/"><img src="/images/icon.png" alt=""></a>
          			</div>
          			<div id="navbar" class="navbar-collapse collapse">
           	 			<ul class="nav navbar-nav">
             	 			<li><a href="/">Home</a></li>
             	 			<li><a href="/lorem-ipsum">Lorem Ipsum</a></li>
             	 			<li><a href="/random-user">Random User</a></li>
            			</ul>
          			</div><!--/.nav-collapse -->
        			</div><!--/.container-fluid -->
      		</nav>
      		
      		<h2>
					@yield('subheading')
				</h2>

				<p class="justify">
					{{-- Page description will be yielded here --}}
					@yield('description')
				</p>

    			<section>
        			{{-- Main page content will be yielded here --}}
        			@yield('content')
    			</section>

    		<footer>
    			Copyright &copy; {{ date('Y') }} Hannah Riggs <br>
    			<a href="https://icons8.com/" target="_blank">Icon source</a>
    		</footer>
    		</div> <!-- end content -->
    		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
   	</div> <!-- end row of all content -->
	</div> <!-- end container-fluid -->
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>	
   @yield('body')
    
</body>
</html>