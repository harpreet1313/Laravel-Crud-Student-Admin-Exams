<?php

namespace App\Http\Controllers;

use App\Exams;
use Illuminate\Http\Request;

class ExamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams=\App\Exams::all();
        return view('exam',compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_exam');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $exam = new \App\Exams;
        $exam->exam_title=$request->get('title');
        $exam->exam_date=$request->get('examDate');
        $exam->top_text_html=$request->get('toptext');
        $exam->bottom_text_html=$request->get('bottomText');
        $exam->save();
        $total_questions = $request->get('total_questions');

        for($x=1;$x<=$total_questions;$x++)
        {
            $quiz = new \App\Quiz;
            $quiz->exam_id = $exam->id;
            $quiz->question=  serialize($request->get('question'.$x));
            $quiz->answer = serialize($request->get('answer'.$x));
            $quiz->correct_answer= $request->get('correct_answer'.$x);
            $quiz->save();
        }
        return redirect('exams')->with('success', 'Exams has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exams  $exams
     * @return \Illuminate\Http\Response
     */
    public function show(Exams $exams)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exams  $exams
     * @return \Illuminate\Http\Response
     */
    public function edit(Exams $exams)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exams  $exams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exams $exams)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exams  $exams
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exams $exams)
    {
        //
    }
}
