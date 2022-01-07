<nav class="fh5co-nav" role="navigation" style="background-color:#fae3c9">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-2 text-center">
                <ul>
                    <li><a href="{{ route('home') }}"><img src="/image/logo.png" width="80px"></img></a></li>
                    <li class="has-dropdown">
                        <a href="#">Rent</a>
                        <ul class="dropdown">
                            <li><a href="{{ route('Console') }}">Consoles</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown">
                        <a href="#">Account</a>

                        <ul class="dropdown">
                            @if (Route::has('login'))
                                @auth
                                <li><p>Hello, {{ Auth::user()->name }}!</p></li>

                                      <!-- Account Management -->
                                    <li> <a href="{{route('OrderList')}}">Order List</a></li>
                                      <!-- Authentication -->
                                    <li>
                                      <form method="POST" action="{{ route('logout') }}">
                                          @csrf

                                          <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                          this.closest('form').submit();" >
                                                          {{ __('Log Out') }}
                                          </a>
                                      </form>
                                    </li>
                                @else
                                  <li><a href="{{ route('login') }}">Log in</a></li>

                                  @if (Route::has('register'))
                                      <li><a href="{{ route('register') }}" >Register</a></li>
                                  @endif
                                @endauth
                            </li>
                            @endif
                        </ul>
                    </li>
                    @if (Route::has('login'))
                        @auth
                      <li class="shopping-cart"><a href="{{ route('cart') }}" class="cart">
                          <span><small>{{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}</small>
                          <i class="icon-shopping-cart"></i></span></a>
                      </li>
                    @else
                      <li class="shopping-cart"><a href="{{ route('login') }}" class="cart">
                          <span><small>{{ 0 }}</small>
                          <i class="icon-shopping-cart"></i></span></a>
                      </li>
                    @endauth
                    @endif
                    @if(session('warning'))
                        <li class="alert alert-danger">
                            {{ session('warning') }}
                        </li>
                    @elseif(session('status'))
                        <li class="alert alert-success">
                            {{ session('status') }}
                        </li>
                    @endif
                </ul>
            </div>

            <div class="col-md-6 col-xs-2">
                <ul>


                </ul>
            </div>
        </div>

    </div>
</nav>
