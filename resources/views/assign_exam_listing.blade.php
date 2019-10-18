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