<?php

namespace App\Http\Controllers;

use App\AssignExam;
use Illuminate\Http\Request;

class AssignExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams=\App\Exams::all();
        return view('assign_exam_listing',compact('exams'));
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
        $user_arr = $request->get('user');
        $delete_exams = \App\AssignExam::where('exam_id',$request->get('exam_id'));
        $delete_exams->delete();
        foreach ($user_arr as $user) {
            $assign= new \App\AssignExam;
            $assign->exam_id = $request->get('exam_id');
            $assign->user_id = $user;
            $assign->score = "";
            $assign->test_status = 0;
            $assign->save();
        }
        return redirect('assign')->with('success', 'Exam has been assigned to users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AssignExam  $assignExam
     * @return \Illuminate\Http\Response
     */
    public function show(AssignExam $assignExam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AssignExam  $assignExam
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignExam $assignExam)
    {
        //
    }

    function assignUser($exam_id)
    {
        $users = \App\User::where('isAdmin','!=','1')->get();
        $exam =\App\Exams::find($exam_id);
        return view('assign_exam',compact('exam','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AssignExam  $assignExam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssignExam $assignExam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AssignExam  $assignExam
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignExam $assignExam)
    {
        //
    }
}
