<?php

namespace App\Http\Controllers;

use App\Models\Correctanswer;
use Illuminate\Http\Request;

class CorrectanswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Correctanswer::all();
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
            'q_id' => 'required',
            'correctanswer' => 'required',

        ]);
        $correctanswer = new Correctanswer();
        $correctanswer->q_id = $request->q_id;
        $correctanswer->correctanswer = $request->correctanswer;

        $correctanswer->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Correctanswer  $correctanswer
     * @return \Illuminate\Http\Response
     */
    public function show(Correctanswer $correctanswer)
    {
        $correctanswer = Correctanswer::findOrFail($id);
        return $correctanswer;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Correctanswer  $correctanswer
     * @return \Illuminate\Http\Response
     */
    public function edit(Correctanswer $correctanswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Correctanswer  $correctanswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $correctanswer=Correctanswer::findOrFail($id);
        $correctanswer->q_id = $request->q_id;
        $question->correctanswer = $request->correctanswer;
        $question->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Correctanswer  $correctanswer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $correctanswer = Correctanswer::findOrFail($id);
        $correctanswer->delete();
        return $correctanswer;
    }
}
