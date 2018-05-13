@extends("admin/layouts/adminapp")
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Users</title>
</head>
<body>


@section('content')

    <div class="admin">
        <div class="row">
            <div class="col-md-3">
                <h1 class="message">Users </h1>
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
                            <th scope="col">NAME</th>
                            <th scope="col">EMAIL ADDRESS</th>
                            <th scope="col">OPTIONS</th>


                        </tr>
                        </thead>
                        <tbody class="bodytr">
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$counter++}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>

                            <td>
                                <div class="admin-check">


                                    <button type="button"  class="btn center-block " onclick=""><i class="fa fa-trash fa-2x"></i></button>
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
@stop



</body>
</html>