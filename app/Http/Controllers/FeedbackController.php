<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
      

        $Feedback =new Feedback();
        $Feedback->Name = $request->Name;
        $Feedback->comment = $request->comment;
        $Feedback->star = $request->star;
        $Feedback->save();
    }
}
