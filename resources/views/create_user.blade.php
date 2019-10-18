<!-- create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create User Module</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    {{--    <script  data-src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
</head>
<body>
<div id="app">
    @include('nav')
    @yield('content')
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Student Login</div>
                <div class="panel-body">
                    <form method="post" action="{{url('users')}}" enctype="multipart/form-data">
                        <!--@csrf-->

                            <div class="form-group col-md-8 col-md-offset-2">
                                <label for="Name">Name:</label>
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="form-group col-md-8 col-md-offset-2">
                                <label for="Username">User Name</label>
                                <input type="text" class="form-control" name="username">
                            </div>

                            <div class="form-group col-md-8 col-md-offset-2">
                                <label for="Email">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>

                            <div class="form-group col-md-8 col-md-offset-2">
                                <label for="Password">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <div class="form-group col-md-8 col-md-offset-2" style="margin-top:20px">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
    });
</script>
</body>
</html>
