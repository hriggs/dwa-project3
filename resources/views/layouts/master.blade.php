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
				
				<h2>
					@yield('subheading')
				</h2>
				
				<p>
					{{-- Page description will be yielded here --}}
					@yield('description')
				</p>

    			<section>
        			{{-- Main page content will be yielded here --}}
        			@yield('content')
    			</section>

    		<footer>Copyright &copy; {{ date('Y') }} Hannah Riggs</footer>
    		</div> <!-- end content -->
    		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2"></div>
   	</div> <!-- end row of all content -->
    </div> <!-- end container-fluid -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')
    
</body>
</html>