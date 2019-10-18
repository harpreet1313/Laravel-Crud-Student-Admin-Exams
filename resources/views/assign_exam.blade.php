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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css" rel="stylesheet">
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
    <h2>Assign exam to Students</h2><br/>

    <form method="post" action="{{url('assign')}}" enctype="multipart/form-data">
        <!--@csrf-->
        <div class="row">
            <div class="col-md-12"></div>
            <div class="form-group col-md-12">
                <h4>Exam Title: {{$exam['exam_title']}}</h4>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12"></div>
            <div class="form-group col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <b>Top Text for exam:</b>
                    </div>
                    <div class="col-md-10">{!! $exam['top_text_html'] !!}</div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12"></div>
            <div class="form-group col-md-12">
                <div class="row">
                    <div class="col-md-2">
                        <b>Assign Student: </b>
                    </div>
                    <div class="col-md-10">
                        <select class="mdb-select md-form multiple" multiple name="user[]" id="user_select">
                            <option value="" disabled selected>Choose User</option>
                            @foreach($users as $user)
                                <option value="{{$user['id']}}">{{$user['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

       <!-- <div class="row">
            <div class="col-md-8"></div>
            <div class="form-group col-md-8">

                <label for="Name">Assign Student: </label>
                    <select class="mdb-select md-form multiple" multiple name="user[]" id="user_select">
                        <option value="" disabled selected>Choose User</option>
                        @foreach($users as $user)
                        <option value="{{$user['id']}}">{{$user['name']}}</option>
                        @endforeach
                    </select>
            </div>
        </div>-->

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-top:60px">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="exam_id" value="{{$exam['id']}}">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.js"></script>

<script type="text/javascript">
    $('.multiple').multiselect('select', 2);
</script>
</body>
</html>
