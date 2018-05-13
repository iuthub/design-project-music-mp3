@extends("admin/layouts/adminapp")
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile</title>
</head>
<body>


@section('content')

    <div class="admin">
        <div class="row">
            <div class="col-md-3">
                <h1 class="message">Message  </h1>
            </div>
        </div>
        <div class="admin-table">
        <div class="container">
            <div class="tables">
            <table class="table table-hover table-bordered">
                    <thead>
                    <tr class="maintr">
            <th scope="col">#</th>
            <th scope="col">USERS’ NAME</th>
            <th scope="col">MESSAGE</th>
            <th scope="col">DATA</th>
        </tr>
        </thead>
        <tbody class="bodytr">
        @foreach($messages as $message)
        <tr>
            <th scope="row">{{$message->id}}</th>
            <td>{{$message->name}}</td>
            <td>{{$message->message}}</td>
            <td>{{$message->email}}</td>
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