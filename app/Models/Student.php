<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    use HasFactory;

    protected $table ="students";

    protected $fillable = ['first_name','last_name','address','phone','email','roll','college'];

    public static function getStudent()
    {
        $records =DB::table('students')->select('id','first_name','last_name','phone','email','address','roll','college')->get()->toArray();
        return $records;
    }
}
