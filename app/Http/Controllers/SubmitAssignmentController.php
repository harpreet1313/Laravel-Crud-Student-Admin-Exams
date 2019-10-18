<?php

namespace App\Http\Controllers;

use App\SubmitAssignment;
use Illuminate\Http\Request;

class SubmitAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function submitExam($exam_id)
    {
        $quizzes = \App\Quiz::where('exam_id',$exam_id)->get();
        $exam = \App\Exams::find($exam_id);
        return view('submit_exam',compact('exam','quizzes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubmitAssignment  $submitAssignment
     * @return \Illuminate\Http\Response
     */
    public function show(SubmitAssignment $submitAssignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubmitAssignment  $submitAssignment
     * @return \Illuminate\Http\Response
     */
    public function edit(SubmitAssignment $submitAssignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubmitAssignment  $submitAssignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubmitAssignment $submitAssignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubmitAssignment  $submitAssignment
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubmitAssignment $submitAssignment)
    {
        //
    }
}
