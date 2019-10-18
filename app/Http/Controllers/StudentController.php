<?php

namespace App\Http\Controllers;

use App\AssignExam;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $exams = DB::table('assign_exams')
            ->join('exams', 'exams.id', '=', 'assign_exams.exam_id')
            ->select('exams.*','assign_exams.*')
            ->where('user_id',$user['id'])
            ->get();

        return view('list_exams',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $submitted_exam = $request->all();
        $exam_id = $submitted_exam['exam_id'];
        $user_id = Auth::user()->id;
        $score = 0;
        $each_question_marks = 5;
        $total_questions = $submitted_exam['total_questions'];
        for($x=1;$x<=$total_questions;$x++)
        {
            if($submitted_exam['answer'.$x]==$submitted_exam['correct_answer'.$x])
            {
                $score = $score + $each_question_marks;
            }
        }
        \App\AssignExam::where('exam_id',$exam_id)->where('user_id',$user_id)->update(['score'=>$score,'test_status'=>1]);
        return redirect('student')->with('success', 'Your exam has been submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
