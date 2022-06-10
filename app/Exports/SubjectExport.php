<?php

namespace App\Exports;

use App\Models\Subject;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class SubjectExport implements FromCollection
{
    public function headings():array{
        return[
            'Id',
            'Subject Name',
            'Subject Code'
            
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Subject::all();
        return collect(Student::getStudent());

    }
}
