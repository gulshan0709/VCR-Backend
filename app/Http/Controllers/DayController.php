<?php

namespace App\Http\Controllers;
use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{
    
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $data =Day::all();
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
          
    
            $Day =new Day();
            $Day->day_name = $request->day_name;
            $Day->save();
        }
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $Day = Day::findOrFail($id);
            return $Day;
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
            $Day =  Day::findOrFail($id);
            $Day->day_name = $request->day_name;
            $Day->save();
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            
            
            $Day = Day::findOrFail($id);
            $Day->delete();
            return $Day;
        }
    
    /**
         * Search the specified resource from storage using first name
         *
         * @param  str  $first_name
         * @return \Illuminate\Http\Response
         */
    
        
    }

