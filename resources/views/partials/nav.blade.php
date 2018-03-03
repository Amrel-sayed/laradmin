      <div class="blog-masthead">
        <div class="container">
         <div class="row">
          <nav class="nav col-8">
            <a class="nav-link active" href="/posts">Home</a>
            <a class="nav-link" href="#">New features</a>
            <a class="nav-link" href="#">Press</a>
            <a class="nav-link" href="#">New hires</a>
            <a class="nav-link" href="#">About</a>
          </nav>
                 <ul class="nav col-3 ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle nav-link  " data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li> <a href="/comments/{{ Auth()->user()->id }}">comments ({{ auth()->user()->comments->count() }})</a></li>
                                    <li> <a href="/posts/{{ Auth()->user()->id }}/user">posts ({{ auth()->user()->posts->count()}})</a></li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
        </div>
        </div>
      </div>