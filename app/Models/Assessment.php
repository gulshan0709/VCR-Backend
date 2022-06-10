<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    protected $table ="assessment";
    protected $fillable = ['assessment_name','event_date','time'];
}
