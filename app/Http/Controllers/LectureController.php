<?php

namespace App\Http\Controllers;
use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lecture::all();
        return $data;

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
      

        $Lecture =new Lecture();
        $Lecture->lect_name = $request->lect_name;
        $Lecture->lect_time = $request->lect_time;
        $Lecture->save();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Lecture = Lecture::findOrFail($id);
        return $Lecture;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Lecture =  Lecture::findOrFail($id);
        $Lecture->lect_name = $request->lect_name;
        $Lecture->lect_time = $request->lect_time;
        $Lecture->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        
        $Lecture = Lecture::findOrFail($id);
        $Lecture->delete();
        return $Lecture;
    }

/**
     * Search the specified resource from storage using first name
     *
     * @param  str  $first_name
     * @return \Illuminate\Http\Response
     */

    
}