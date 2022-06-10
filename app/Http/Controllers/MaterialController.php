<?php
namespace App\Http\Controllers;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =Material::all();
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
    
        ]);
        $fields = $request->validate([
        'course' => '',
        'comment' => 'required',
        'material' => ''
    ]);

        $pdf=$request->file("file");
        $pdfName = time().'.'.$pdf->extension();
        $pdf->move(public_path('notes'),$pdfName);
        
        $notes = Material::create([
            'course' => $fields['course'],
            'comment' => $fields['comment'],
            'material'=> $fields['material'] = $pdfName            
        ]);
        $response = [
            'user' => $notes
            
        ];
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $Material = Material::findOrFail($id);
        $Material->delete();
        return $Material;
    }


     
    //   @return \Illuminate\Http\Response
   

    
}

