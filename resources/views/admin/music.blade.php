@extends("admin/layouts/adminapp")
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Music</title>
</head>
<body>


@section('content')

    <div class="admin">
        <div class="row">
            <div class="col-md-3">
                <form method="post" action="{{route('admin_add_m')}}" enctype="multipart/form-data">
                    {{csrf_field()}}

                <h1 class="message">Music <button type="submit" class="add-admin">
                        ADD
                    </button>
                    <label class="add">
                        <input type="file" id="file" name="file">
                        <i class="fa fa-plus"></i>
                    </label></h1>
                </form>
            </div>
            <div class="col-md-3">
                <div class="navbar_search ">
                    <i class="fa fa-search search-icon" id="stoggle"></i>
                    <input type="search" placeholder="Search" class="search_input">
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
                            function musicDel($id) {
                                $.ajax({
                                    method: "GET",
                                    url:"{{route('admin_delete')}}",
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
                        @foreach($musics as $music)
                        <tr id="{{$music->id}}">
                            <th scope="row">{{$counter++}}</th>
                            <td>{{$music->genre}}</td>
                            <td>{{$music->artist}}</td>
                            <td>{{$music->name}}</td>
                            <td>
                                <div class="admin-check">
                                    <button type="button" class="btn fa-admin1" data-toggle="modal" data-target="#edit" data-whatever="" id="edit_song" onclick="pathData({{$music->id}})"><i class="fas fa-user-edit"></i></button>
                                    <button type="button"  class="btn fa-admin1" onclick="musicDel({{$music->id}})"><i class="fa fa-trash"></i></button>
                                    <button type="button"  class="btn fa-admin1" onclick="play('{{asset($music->file_path)}}')"><i class="fa fa-play"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <audio class="someClass" id="audio" controls autoplay src="" ></audio>
    </div>

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
                    <form method="POST" action="{{route('admin_add_edit')}}" >
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
                                    type: 'POST',
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