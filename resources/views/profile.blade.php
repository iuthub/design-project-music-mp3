@extends("layouts/app")
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile</title>
</head>
<body>


@section('content')
<div class="p-profile">
<div class="container">
        <div class="row">
<div class="col-md-12">
    <ul class="ul-profile">
        <li class="li1">
            <a href="#">Edit</a>
        </li>
        <li class="li2">
            <a href="#">/ Main</a>
        </li>
    </ul>
</div>
           	<div class="profile col-md-3">

                <div class="profile-avatar">
                    <i class="fa fa-user"></i>
                    <i class="fa fa-plus-circle"></i>
                </div>
                <div class="profile-info">
                    <h2>{{Auth::user()->name}}</h2>
                    <hr>
                    <ul class="ul1">
                        <li >
                            <a href="{{ route('profile') }}" class="ul1">Songs</a>
                        </li>
                        <li class="li1">
                            385
                        </li>
                    </ul>
                    <ul class="ul2">
                        <li >
                            Share
                        </li>
                        <li class="li1">
                            <i class="fa fa-share-alt"></i>
                        </li>
                    </ul>
                    <ul class="ul3">
                        <li  >
                            Add Music
                        </li>
                        <li class="li1">
                            <i class="fa fa-plus"></i>
                        </li>
                    </ul>
                    <a href="{{ route('profile') }}" class="edit"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('profile') }}" class="edit">Edit   </a>

                    <a  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><button class="logout">
                            {{ __('Logout') }}


                         </button>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form></a>

                </div>
            </div>
            <div class="col-md-9">
                <div class="profile-change">
                    <form action="{{route('users.update')}}" method="patch" id="change">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="change">
                            <div class="change-field">
                                <label for="changename">Name*</label>
                                <input type="text" placeholder="{{Auth::user()->name}}" name="name" id="changename">
                            </div>
                            <div class="change-field">
                                <label for="changeemail">Email Address*</label>
                                <input type="email" placeholder="{{Auth::user()->email}}" name="email" id="changeemail">
                            </div>
                            <div class="change-field">
                                <label for="changepassword">Password*</label>
                                <input type="password" placeholder="" name="password" id="changepassword">
                            </div>
                            <div class="change-field">
                                <label for="confirmpassword">Confirm Password*</label>
                                <input type="password" placeholder="" name="confirmpassword" id="confirmpassword">
                            </div>
                        </div>
                    </form>

                        <button type="submit" form="change" value="Sumbit" class="edit-button">Edit</button>

                </div>
            </div>
        </div>
</div>
</div>


@stop



</body>
</html>