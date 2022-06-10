<?php

namespace App\Exports;
use App\Models\Faculty;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class FacultyExport implements FromCollection,WithHeadings
{

    public function headings():array{
        return[
            'Id',
            'First Name',
            'Last Name',
            'DOB',
            'Phone',
            'Email'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Faculty::all();
        return collect(Faculty::getFaculty());

    }
}
