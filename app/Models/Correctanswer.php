<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correctanswer extends Model
{
    use HasFactory;
    
    protected $table ="correctanswer";

    protected $fillable = ['q_id','correctanswer'];
}
