<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div id="app">
    @include('nav')

    @yield('content')
</div>

<div class="container">
    <br />
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <div><a type="button" value="Create User" href="users/create" class="btn btn-success">Create User</a></div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>User Name</th>
            <th>Email</th>
            <th>Action</th>
            <!--<th colspan="2">Assign Exams</th>-->
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user['id']}}</td>
                <td>{{$user['name']}}</td>
                <td>{{$user['username']}}</td>
                <td>{{$user['email']}}</td>
                <td><a href="users/{{$user['id']}}">View Exam Score </a></td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>