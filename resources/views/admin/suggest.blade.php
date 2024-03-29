@extends("admin/layouts/adminapp")
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Suggest</title>
</head>
<body>


@section('content')
    <div class="admin">
        <div class="admin-h1">
            <div class="row">
                <div class="col-md-3">
                    <h1 class="message">Suggest  </h1>
                </div>
            </div>
        </div>
        <div class="admin-table">
            <div class="container">
                <div class="tables">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr class="maintr">
                            <th scope="col">#</th>
                            <th scope="col">GENRES</th>
                            <th scope="col">AUTHOR</th>
                            <th scope="col">NAME OF SONG</th>
                            <th scope="col">OPTIONS</th>
                        </tr>
                        </thead>
                        <tbody class="bodytr">
                        <script>
                            function suggestDel($id) {
                                $.ajax({
                                    method: "GET",
                                    url:"{{route('suggestDelete')}}",
                                    data:{id:$id}
                                }).done(function () {
                                    document.getElementById($id).outerHTML="";
                                    alert("Suggest done");

                                });
                            }
                        </script>
                        <script>
                            function pathData($id){
                                $.ajax({
                                    method: "GET",
                                    url:"{{route("suggestedMusic")}}",
                                    data:{id:$id}
                                }).done(function (resp) {
                                    alert(resp["name"]);
                                        $("#genres").val(resp["genre"]);
                                        $("#author").val(resp["artist"]);
                                        $("#music_name").val(resp["name"]);
                                        $("#id").val(resp["id"]);
                                });

                            }
                        </script>
                        @foreach($suggests as $key=>$suggest)
                        <tr id="{{$suggest->id}}">
                            <th scope="row" id="song_id">{{$key+1}}</th>
                            <td>{{$suggest->genre}}</td>
                            <td>{{$suggest->artist}}</td>
                            <td>{{$suggest->name}}</td>
                            <td>
                                <div class="admin-check">
                                    <button type="button" class="btn fa-admin1" data-toggle="modal" data-target="#edit" data-whatever="" id="edit_song" onclick="pathData({{$suggest->id}})"><i class="fas fa-user-edit"></i>
                                    </button>
                                    <button type="button"  class="btn fa-admin1" onclick="suggestDel({{$suggest->id}})"><i class="fa fa-trash"></i></button>
                                    <button type="button"  class="btn fa-admin1" onclick="play('{{asset($suggest->file_path)}}')"><i class="fa fa-play"></i></button>
                                </div>
                            </td>
                        </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <audio class="someClass" id="audio" controls autoplay src="" ></audio>
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="GET" action="{{route('setGlobal')}}" >
                        {{csrf_field()}}
                        <div class="form-group" >
                            <label for="genres" class="col-form-label">Genres:</label>
                            <input type="text" class="form-control" id="genres" name="genre">
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-form-label">Author:</label>
                            <input type="text" class="form-control" id="author" name="artist">
                        </div>
                        <div class="form-group">
                            <label for="music-name" class="col-form-label">Name of a song:</label>
                            <input type="text" class="form-control" id="music_name" name="title" >
                        </div>
                            <div hidden>
                                <input type="number" id="id" name="music_id">
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="add">Submit</button>
                        </div>
                    </form>
                        <script>
                            $(document).ready(function () {
                                $('form').submit(function (event) {
                                    var formData = {
                                        'genre': $('input[name=genre]').val(),
                                        'artist': $('input[name=artist]').val(),
                                        'title': $('input[name=title]').val(),
                                        'id': $('input[name=music_id]').val()
                                    };
                                    $.ajax({
                                        type: 'GET',
                                        url: 'process.php',
                                        data: formData,
                                        dataType: 'json',
                                        encode: true
                                    }).done(function (data) {
                                                console.log(data);
                                    });
                                    event.preventDefault();
                                });
                            });

                        </script>
                </div>


            </div>
        </div>
    </div>
@stop



</body>
</html>