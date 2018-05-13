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
    <section class="mainplaylist">
    <div class="p-profile">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="ul-profile">
                        <li class="li1">
                            <a href="#">My playlist</a>
                        </li>
                        <li class="li2">
                            <a href="{{route('music')}}">/ Main</a>
                        </li>
                    </ul>
                </div>
                <div class="profile col-md-3">

                    <div class="profile-avatar">
                        <i class="fa fa-user"></i>

                    </div>
                    <div class="profile-info">
                        <h2>{{Auth::user()->name}}</h2>
                        <hr>
                        <ul class="ul1">
                            <li >
                                Songs
                            </li>
                            <li class="li1">
                                {!! count($playlist) !!}
                            </li>
                        </ul>

                        <ul class="ul3">
                            <li  >
                                Add Music
                            </li>
                            <li >
                                <form method="post" action="{{route('upload.music')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <label class="add">
                                        <input type="file" id="file" name="file">
                                        <i class="fa fa-plus"></i>
                                    </label>
                                   <button type="submit" class="fileinput">Submit</button>
                                </form>
                            </li>
                        </ul>
                        <a href="{{route('profile')}}" class="edit"><i class="fa fa-edit"></i></a>
                        <a href="{{route('profile')}}" class="edit">Edit   </a>

                        <button class="logout">Log out </button>

                    </div>
                </div>
                <div class="col-md-9">
                    <script>
                    function suggest($id) {
                    $.ajax({
                    method: "GET",
                    url:"{{route('makeSuggest')}}",
                    data:{id:$id}
                    }).done(function () {
                    alert("Suggest done");
                    });
                    }

                    function unlike($id) {
                        $.ajax({
                            method: "GET",
                            url:"{{route('unlike')}}",
                            data:{id:$id}
                        }).done(function () {
                            alert("Unliked");
                        });
                    }

                    </script>

                    <ul class="list-group ulistlist">
                        @foreach($playlist as $key=>$song)
                                <li class="list-group-item listlist">
                                    <div class="playlist">
                                        <div class="row">
                                            <div class="col-md-11">
                                                <div hidden id="musid">{{$song->id}}</div>
                                                <h1>{{++$key}}</h1>
                                                <div class="image" style="background-image: url('{{$song->img_path}}')" >
                                                    <p hidden id="file_path" class="filepatth">{{$song->file_path}}</p>
                                                    <button class="buttonplay" type="button" onclick="play('{{asset($song->file_path)}}')">
                                                        <i class="fa fa-play"></i>
                                                    </button>
                                                </div>
                                                <span class="name">{{$song->artist}}</span>
                                                <br>
                                                <span class="name">{{$song->name}}</span>


                                            </div>
                                            <div class="col-md-1">
                                                <div class="tools">
                                                    <button class="heart" onclick="unlike({{$song->id}})"><i class="fa fa-heart"></i> </button>
                                                    @if(!$song->set_global==1)
                                                    <button class="heart" onclick="suggest({{$song->id}})"><i class="fa fa-share-alt"></i></button>
                                                    @endif
                                                        <p class="duration">{{$song->duration}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                        @endforeach
                    </ul>


                </div>
            </div>
        </div>
        <audio class="someClass" id="audio" controls autoplay src="" ></audio>
    </div>

    </section>
@stop



</body>
</html>