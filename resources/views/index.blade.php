@extends("layouts/app")
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Music</title>
</head>
<body>
@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 body-top">
            <img src="img/mainpic.PNG" alt="Los Angeles" >
                <section class="nerdy-pen">
                    <div class="b-inline-block">
                        <h1 class="nerdy-pen__text">
                          <span
                             class="txt-rotate"
                             data-period="2000"
                             data-rotate='[ "Listen your adorable songs", " Blues and ballad", "Classic and Jazz", "Any song you want!" ]'>
                             </span>
                        </h1>
                    </div>
                </section>
        </div>
        <div class="col-sm-6 music-type b-left">
            <p>Top New Releases</p>
        </div>
         <div class="col-sm-6  music-type b-right">
            <p>Popular</p>
        </div>
    </div>
</div>
<div class=" main">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-sm-6 music-active music-top-left ">
                <img id ="New" src ="img/3.PNG"/>
            </div>
                <div class="col-sm-6 music-active music-top-right">
                    <img id ="Popular" src ="img/3.PNG"/>
                </div>
            <div class="col-sm-6 block-music-inactive">
                 <div class="mobile-visible">Top New Releases</div>
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
                <ul class="list-group ">
                @foreach($new_song as $new)
                        <li class="list-group-item listlist">
                    <div class="border">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="music-inactive a-block">
                                    <img src="{{$new->img_path}}" onclick="changeImg(this,'New','{{asset($new->file_path)}}')">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="b-block a-block">
                                            <div class="a-block p-right">
                                                <b id="a-name">{{$new->artist}}</b>
                                                <p>{{$new->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="music-info">
                                            <div class="a-block">
                                               <button type="button" class="heart" onclick="pathData({{$new->id}})"><i class="fas fa-heart"></i></button>
                                            </div>
                                            <div class="a-block" style="color: #4F4F4F">
                                                <p>{{$new->duration}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        </li>
                @endforeach
                </ul>
            </div>
            <div class="col-sm-6 block-music-inactive">
                <div class="mobile-visible">Popular</div>
                <ul class="list-group ">
                @foreach($popular_song as $popular)
                        <li class="list-group-item listlist">
                    <div class="border">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="music-inactive a-block">
                                    <img src="{{$popular->img_path}}" onclick="changeImg(this,'Popular','{{asset($popular->file_path)}}')">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="b-block a-block">
                                            <div class="a-block p-right">
                                                <b id="a-name">{{$popular->artist}}</b>
                                                <p>{{$popular->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-2">
                                            <div class="music-info">
                                                <div class="a-block">
                                                    <button type="button" class="heart" onclick="pathData({{$popular->id}})"><i class="fas fa-heart"></i></button>
                                                </div>
                                                <div class="a-block" style="color: #4F4F4F">
                                                    <p>{{$popular->duration}}</p>
                                                </div>
                                            </div>
                                        </div>
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

@stop
</body>
</html>
