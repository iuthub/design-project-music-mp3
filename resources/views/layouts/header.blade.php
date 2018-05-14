<section id="header">
    <div class="inner_header">
        <div class="logo">
            <a href="{{route('music')}}"> <img src="{{ asset('img/version.svg') }}" alt="logo"></a>
        </div>
        <div class="navbar_block">
            <div class="navbar_ul">
                <ul id="ul">
                    <li><a href="{{route('genres')}}" class="ul_a">Genres</a></li>
                    <li><a href="{{route('about')}}" class="ul_a">About</a></li>
                    <!-- <li><a href="#" id="ul_a">Sign in</a></li> -->
                    @guest
                    <li><a href="#" class="ul_a" data-toggle="modal" data-target="#exampleModal">Sign in</a></li>
                    @else <li><a href="{{route('playlist')}}" class="ul_a">{{ Auth::user()->name }}</a></li>
                    @endguest
                </ul>
            </div>
            <div class="navbar_search">
                {{--<i class="fa fa-search search-icon" id="stoggle"></i>--}}
                {{--<input type="search" placeholder="Search" class="search_input">--}}
            </div>
            <div id="close">&times</div>
            <div class="hamburger">
                <span id="span"></span>
            </div>
            @guest

            @else
                <div class="navbar_signin dropdown">
                    <a href="{{route('playlist')}}" class="dropbtn">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <div class="dropdown-content">
                        <a href="{{route('profile')}}" class="drp">Profile</a>
                        <a href="{{route('playlist')}}" class="drp">Playlist</a>
                        <a class="drp"  href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                @endguest
        </div>

    </div>
    <div class="login-popup">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times login-close"></i>  </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary login-button">
                                        {{ __('Login') }}
                                    </button>

                                </div>

                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 notamember">

                                    <br>
                                    <span>
                                            Not a member yet? <a href="#" data-toggle="modal" data-target="#register">Sing up</a>
                                        </span>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="register-popup">

        <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="register" aria-hidden="true">

            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header login-close">
                        <button type="button" class="close " data-dismiss="modal" aria-label="Close"><i class="fa fa-times "></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="register-avatar">
                                            <i class="fa fa-user"></i>


                                        </div>

                                    </div>
                                    <div class="col-md-8 register-info">
                                        <div class="form-group row">
                                            <label for="name" class="col-md-5 col-form-label register-names" >{{ __('Name') }}</label>
                                            <div class="col-md-6 register-value">
                                                <input id="name" type="text" class="register-type form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-md-5 col-form-label register-names">{{ __('E-Mail Address') }}</label>
                                            <div class="col-md-6 register-value">
                                                <input id="email" type="email" class="register-type form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-md-5 col-form-label register-names">{{ __('Password') }}</label>
                                            <div class="col-md-6 register-value">
                                                <input id="password" type="password" class="register-type form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-5 col-form-label register-names">{{ __('Confirm Password') }}</label>
                                            <div class="col-md-6 register-value">
                                                <input id="password-confirm" type="password" class="register-type form-control" name="password_confirmation" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-0 register-submit">
                                            <div class="col-md-8">
                                                <button type="submit" class="register-submit-button">
                                                    {{ __('Submit') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row ">
                                    <div class="col-md-12 notamember">

                                    </div>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
