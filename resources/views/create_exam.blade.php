<!-- create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Exam Creation </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
</head>
<body>
<div id="app">
    @include('nav')

    @yield('content')
</div>

<div class="container">
    <h2>Exams Detail</h2><br/>
    <form method="post" action="{{url('exams')}}" enctype="multipart/form-data" autocomplete="off">
        <!--@csrf-->
        <div class="row">

            <div class="form-group col-md-6">
                <label for="Title">Exam Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>

            <div class="form-group col-md-6">
                <label for="examDate">Exam Date</label>
                <input type="text"  id="datepicker" class="form-control" name="examDate" >
            </div>


            <div class="form-group col-md-6">
                <label for="Toptext">Exam Top Text</label>
                <textarea class="form-control" id="editor1" name="toptext" ></textarea>
            </div>

            <div class="form-group col-md-6">
                <label for="BottomText">Exam Bottom Text</label>
                <textarea type="text" class="form-control" id="editor2" name="bottomText"></textarea>
            </div>

        </div>

        <div id="classContainer">
            <div class="row" id="dynamicQuestion1">
                <fieldset style="border:1px solid black; margin: 6px; padding: 10px 6px; ">
                <div class="form-group col-md-12">
                    <label for="Question1">Question 1</label>
                    <input type="text" class="form-control" name="question1" placeholder="Enter your question here" required>
                </div>

                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="answer1[]" placeholder="Option 1" required>
                    <input type="radio" name="correct_answer1" placeholder="Option 1" value="1" checked> <label for="correct_answer" required> Correct Answer</label>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="answer1[]" placeholder="Option 2" required>
                    <input type="radio" name="correct_answer1"  value="2"> <label for="correct_answer"> Correct Answer</label>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="answer1[]" placeholder="Option 3" required>
                    <input type="radio" name="correct_answer1" placeholder="Option 2" value="3"> <label for="correct_answer"> Correct Answer</label>
                </div>
                <div class="form-group col-md-2">
                    <input type="text" class="form-control" name="answer1[]" placeholder="Option 4" requireds>
                    <input type="radio" name="correct_answer1" placeholder="Option 2" value="4"> <label for="correct_answer"> Correct Answer</label>
                </div>
                </fieldset>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="total_questions" id="total_questions" value="1">
                <input type="button" value="Add New Question" id="addQuestion" class="btn btn-success">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-top:60px">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });

    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );

    $(document).on('click', '.deleteQuestion', function () {

        var deleteId = $(this).attr("data-delete-id");
        $('#dynamicQuestion'+deleteId).remove();
        var question_id = $('#total_questions').val();


        question_id = parseInt(question_id)-1;
        $('#total_questions').val(question_id);
    });

    $(document).on('click','#addQuestion',function(){
         var question_id = $('#total_questions').val();


        question_id = parseInt(question_id)+1;
        $('#total_questions').val(question_id);

        var html = '<div class="row" id="dynamicQuestion'+question_id+'">\n' +
            '                <fieldset style="border:1px solid black; margin: 6px; padding: 6px;">\n' +
            '                <div class="form-group col-md-12">\n' +
            '                    <label for="Question'+question_id+'">Question '+question_id+'</label>\n' +
            '                    <input type="text" class="form-control" name="question'+question_id+'" placeholder="Enter your question here">\n' +
            '                </div>\n' +
            '\n' +
            '                <div class="form-group col-md-2">\n' +
            '                    <input type="text" class="form-control" name="answer'+question_id+'[]" placeholder="Option 1" required>\n' +
            '                    <input type="radio" name="correct_answer'+question_id+'" placeholder="Option 1" value="1" checked> <label for="correct_answer"> Correct Answer</label>\n' +
            '                </div>\n' +
            '                <div class="form-group col-md-2">\n' +
            '                    <input type="text" class="form-control" name="answer'+question_id+'[]" placeholder="Option 2">\n' +
            '                    <input type="radio" name="correct_answer'+question_id+'" placeholder="Option 2" value="2"> <label for="correct_answer"> Correct Answer</label>\n' +
            '                </div>\n' +
            '                <div class="form-group col-md-2">\n' +
            '                    <input type="text" class="form-control" name="answer'+question_id+'[]" placeholder="Option 3">\n' +
            '                    <input type="radio" name="correct_answer'+question_id+'" placeholder="Option 2" value="3"> <label for="correct_answer"> Correct Answer</label>\n' +
            '                </div>\n' +
            '                <div class="form-group col-md-2">\n' +
            '                    <input type="text" class="form-control" name="answer'+question_id+'[]" placeholder="Option 4">\n' +
            '                    <input type="radio" name="correct_answer'+question_id+'" placeholder="Option 2" value="4"> <label for="correct_answer"> Correct Answer</label>\n' +
            '                </div>\n' +
            '                <div class="col-md-2">\n' +
            '                    <input type="button" class="deleteQuestion btn btn-danger" value="Delete this question"  id="deleteQuestion'+question_id+'" data-delete-id="'+question_id+'">\n' +
            '                </div>\n' +
            '                </fieldset>\n' +
            '            </div>';
        $("#classContainer").append(html);

    });
</script>
</body>
</html>
