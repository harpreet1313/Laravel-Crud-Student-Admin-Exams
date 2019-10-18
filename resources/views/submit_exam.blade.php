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
    <form method="post" action="{{url('student')}}" enctype="multipart/form-data">
        <!--@csrf-->
        <div class="row">

            <div class="form-group col-md-12">
                <h2>Exam Title: {{$exam['exam_title']}}</h2><br>

                {!! $exam['top_text_html'] !!}
                <?php $correct_answer_count = 0;
                ?>
                @foreach($quizzes as $quiz)

                    <?php
                    $option_no = 0;
                    $correct_answer_count++;

                    ?>
                        <b>Q{{$correct_answer_count}}: {{unserialize($quiz->question)}}</b> <br>
                <?php

                    foreach(unserialize($quiz->answer) as $answer)
                    {
                        $option_no++;
                            ?>
                <div>
                        <input type="radio" name="answer<?php echo $correct_answer_count; ?>" value="{{ $option_no }}"> {{$answer}}
                </div>
                        <?php
                    }
                    echo "<br><br>";
                    ?>
                    <input type="hidden" name="correct_answer<?php echo $correct_answer_count; ?>" value="{{ $quiz->correct_answer }}">
                @endforeach

                <input name="total_questions" type="hidden" value="{{$correct_answer_count}}">
                <input type="hidden" name="exam_id" value="{{$exam['id']}}">
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12" style="margin-top:60px">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
    });
</script>
</body>
</html>
