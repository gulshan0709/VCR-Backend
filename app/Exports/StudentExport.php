<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class StudentExport implements FromCollection,WithHeadings
{

    public function headings():array{
        return[
            'Id',
            'First Name',
            'Last Name',
            'Phone',
            'Email',
            'Address'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Student::all();
        return collect(Student::getStudent());
    }
}
