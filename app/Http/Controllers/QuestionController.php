<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Question::all();
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
        $request->validate([
            'question' => 'required',
            'ans1' => 'required',
            'ans2' => 'required',
            'ans3' => 'required',
            'ans4' => 'required',
            'correctanswer' => 'required',

        ]);
        $question = new Question();
        $question->question = $request->question;
        $question->ans1 = $request->ans1;
        $question->ans2 = $request->ans2;
        $question->ans3 = $request->ans3;
        $question->ans4= $request->ans4;
        $question->correctanswer = $request->correctanswer;

        $question->save();
    }
    public function innerJoin(){
        $result = DB::table('question')
        ->join('student_assessment','question.id','=','student_assessment.q_id' )
        ->join('student_assessment','students.id','=','student_assessment.s_id' )
        ->select('student_assessment.q_id as QUESTION.','question.correctanswer as CORRECTANSWER','student_assessment.student_answer as USERANSWER','student_assessment.first_name as studentName')
        ->get();
        return $result;
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return $question;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->question = $request->question;
        $question->ans1 = $request->ans1;
        $question->ans2 = $request->ans2;
        $question->ans3 = $request->ans3;
        $question->ans4= $request->ans4;
        $question->correctanswer = $request->correctanswer;

        $question->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return $question;
    }
}
