<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use Excel;
use DB;     

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = Student::all();
        $users = DB::table('students')
            ->join('courses', 'students.course_id', '=', 'courses.id')
            ->select('students.*','courses.cname')
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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'roll' => 'required',
            'college' => 'required',
        ]);


        $student = new Student();
        $student->course_id = $request->course_id;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->roll = $request->roll;
        $student->college = $request->college;
        $student->save();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return $student;
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
        $student = Student::findOrFail($id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->roll = $request->roll;
        $student->college = $request->college;
        $student->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return $student;
    }

     /**
     * Search the specified resource from storage using first name
     *
     * @param  str  $first_name
     * @return \Illuminate\Http\Response
     */
    public function search($first_name)
    {
        return Student::where('first_name','like','%'.$first_name.'%')->get();
        

    }

    public function exportIntoExcel()
    {
        return Excel::download(new StudentExport,'studentlist.xlsx');
    }

    public function exportIntoCSV()
    {
        return Excel::download(new StudentExport,'studentlist.csv');

    }
}
