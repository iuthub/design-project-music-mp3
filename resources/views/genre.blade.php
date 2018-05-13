@extends('layouts.app')
<body>
@section('content')
    @include('layouts.styles')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Genres</title>
    </head>
    <div class="container-fluid">
        <div class="container">
            <div class="genre-row">
                <p class="genre-title">Genres  <span class="main-title" >  <a href="{{route('home')}}" style="color: #828282">/ main </a></span></p>
            </div>
            <div class="row">

                <ul class="menu-genres">
                    <li class="menu_item">
                        <a href="{{route('rock')}}" class="menu_link"> Rock </a>
                    </li>
                    <li class="menu_item">
                        <a href="{{route('classical')}}" class="menu_link"> Classical </a>
                    </li>
                    <li class="menu_item">
                        <a href="{{route('pop')}}" class="menu_link"> Pop </a>
                    </li>
                    <li class="menu_item">
                        <a href="{{route('rap')}}" class="menu_link"> Rap </a>
                    </li>
                    <li class="menu_item">
                        <a href="{{route('jazz')}}" class="menu_link"> Jazz </a>
                    </li>
                </ul>

            </div>
            <script>
                function pathData($id){
                    $.ajax({
                        method: "GET",
                        url:"{{route("add_song")}}",
                        data:{id:$id}
                    }).done(function () {
                        alert("Added");
                    });

                }
            </script>
            <div class="container container-genre">
                <div class="table genretable">
                    <div class="row">
                            @foreach($songs as $song)


                                    <div class="th genreth"><img src="{{$song->img_path}}" >

                                        <button class="play-button" onclick="play('{{asset($song->file_path)}}')"><i class="fas fa-play"></i></button>
                                        <div class="button-block">
                                            <button class="heart" onclick="pathData({{$song->id}})" > <i class="fa fa-heart"></i></button>
                                        </div>
                                        <div id="artist-name">{{$song->artist}}</div>
                                        <div id="song-name">{{$song->name}}</div>

                                    </div>




                                @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row 2 music_ flex-container">

        </div>
    </div>





    <audio class="someClass" id="audio" controls src="" ></audio>
    @endsection
</body>
</html>
