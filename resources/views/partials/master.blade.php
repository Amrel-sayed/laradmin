
<!DOCTYPE html>
<html>
    <head>
    	
    	@include('partials.header')
    	@yield('css')

    </head>
        <body>
        		@include('partials.nav')
     	<header>
	      <div class="blog-header">
	        <div class="container">
	          <h1 class="blog-title">The Bootstrap Blog</h1>
	          <p class="lead blog-description">An example blog template built with Bootstrap.</p>
	        </div>
	      </div>
	    </header>
     	
      	
    <main role="main" class="container">

      <div class="row">
          @yield('content') 
          @include('partials.side')
      </div>
    </div>
      			  
  		
  			@include('partials.footer')
        
        </body>
        
        @include('partials.script')
		@yield('js')

</html>
