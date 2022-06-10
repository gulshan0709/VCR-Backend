<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAssessment extends Model
{
    use HasFactory;
    protected $table ="student_assessment";

    protected $fillable = ['student_answer','q_id'];
}
