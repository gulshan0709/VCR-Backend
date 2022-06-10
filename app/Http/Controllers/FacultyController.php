<?php

namespace App\Http\Controllers;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Exports\FacultyExport;

use Excel;


class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Faculty::all();
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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $Faculty =new Faculty();
        $Faculty->subject_id = $request->subject_id;
        $Faculty->first_name = $request->first_name;
        $Faculty->last_name = $request->last_name;
        $Faculty->dob = $request->dob;
        $Faculty->phone = $request->phone;
        $Faculty->email = $request->email;
        $Faculty->save();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factulty = Faculty::findOrFail($id);
        return $factulty;
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
        $Faculty =  Faculty::findOrFail($id);
        $Faculty->first_name = $request->first_name;
        $Faculty->last_name = $request->last_name;
        $Faculty->dob = $request->dob;
        $Faculty->phone = $request->phone;
        $Faculty->email = $request->email;
        $Faculty->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        
        $Faculty = Faculty::findOrFail($id);
        $Faculty->delete();
        return $Faculty;
    }

/**
     * Search the specified resource from storage using first name
     *
     * @param  str  $first_name
     * @return \Illuminate\Http\Response
     */
     function search($first_name)
    {
        return Faculty::where('first_name','like','%'.$first_name.'%')->get();
    
    }

    public function test()
    {
        return view('test');
    }

    public function exportIntoExcel()
    {
        return Excel::download(new FacultyExport,'facultylist.xlsx');
    }

    public function exportIntoCSV()
    {
        return Excel::download(new FacultyExport,'facultylist.csv');

    }
}
