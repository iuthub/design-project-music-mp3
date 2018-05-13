<?php
@extends("layouts/app")
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

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
                            <a href="#">Add Music</a>
                        </li>
                        <li class="li2">
                            <a href="{{route('music')}}">/ Main</a>
                        </li>
                    </ul>
                </div>
                <div class="profile col-md-3">

                    <div class="profile-avatar">
                        <i class="fa fa-user"></i>
                        <a href="#" class="plus"><i class="fa fa-plus-circle"></i></a>
                    </div>
                    <div class="profile-info">
                        <h2>{{Auth::user()->name}}</h2>
                        <hr>
                        <ul class="ul1">
                            <li >
                                Songs
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
                                <button class="add"><i class="fa fa-share-alt"></i></button>
                            </li>
                        </ul>
                        <ul class="ul3">
                            <li  >
                                Add Music
                            </li>
                            <li class="li1">
                                <button class="add"><i class="fa fa-plus"></i></button>
                            </li>
                        </ul>
                        <a href="{{route('profile')}}" class="edit"><i class="fa fa-edit"></i></a>
                        <a href="{{route('profile')}}" class="edit">Edit   </a>

                        <button class="logout">Log out </button>

                    </div>
                </div>
                <div class="col-md-9">
                    <div class="profile-change">


                    </div>
                </div>
            </div>
        </div>
    </div>

    <audio class="someClass" id="audio" controls src="#" ></audio>
@stop



</body>
</html>