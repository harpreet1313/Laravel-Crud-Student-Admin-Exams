<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    {{--    <script  data-src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
<div id="app">
    @include('nav')

    @yield('content')
</div>

<div class="container">
    <br />
    <div><a type="button" value="Create User" href="exams/create" class="btn btn-success">Create Exam</a></div>

@if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif

    <a href=""></a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Exam Title</th>
            <th>Exam Date</th>
            <th>Assign Exams to Students</th>
            <!-- <th colspan="2">Action</th>-->
        </tr>
        </thead>
        <tbody>

        @foreach($exams as $exam)
            <tr>
                <td>{{$exam['id']}}</td>
                <td>{{$exam['exam_title']}}</td>
                <td>{{$exam['exam_date']}}</td>
                <td><a href="assign/{{$exam['id']}}">Assign Exam</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>