<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Faculty extends Model
{
    use HasFactory;

    protected $table ="faculties";

    public static function getFaculty()
    {
        $records =DB::table('faculties')->select('id','first_name','last_name','dob','phone','email')->get()->toArray();
        return $records;
    }

}
