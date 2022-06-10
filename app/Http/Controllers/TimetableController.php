<?php

namespace App\Http\Controllers;
use App\Models\Timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimetableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = Timetable::all();
        $users = DB::table('timetables')
            ->join('courses', 'timetables.course_name', '=', 'courses.id')
            ->join('subjects', 'timetables.subject_name', '=', 'subjects.id')
            ->join('faculties', 'timetables.faculty_name', '=', 'faculties.id')
            ->join('lectures', 'timetables.time_id', '=', 'lectures.id')
            ->select('timetables.*','courses.*', 'subjects.*','faculties.*','lectures.*')
            ->get();
            return $users;
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
        if($request->isMethod('post')){
         $timetable = $request->input();
        foreach ($timetable as $key => $value) {
        $Timetable = new Timetable();
        $Timetable->course_name = $value['course_name'];
        $Timetable->subject_name = $value['subject_name'];
        $Timetable->faculty_name = $value['faculty_name'];
        $Timetable->time_id = $value['time_id'];
        $Timetable->save();
        }
       }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Timetable = Timetable::findOrFail($id);
        return $Timetable;
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
        $Timetable = Timetable::findOrFail($id);
        $Timetable->course_name = $request->course_name;
        $Timetable->subject_name = $request->subject_name;
        $Timetable->faculty_name = $request->faculty_name;
        $Timetable->time_id = $request->time_id;
        $Timetable->save();
        return $Timetable;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Timetable = Timetable::findOrFail($id);
        $Timetable->delete();
        return $Timetable;
    }

}
