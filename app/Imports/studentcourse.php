<?php

namespace App\Imports;
use App\student_course;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class studentcourse implements ToModel,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
   


    public function model(array $row )
    {

        return new student_course([
                 'sid' => $row['reg_number'],
                 'cid' => $row['code'],
                 'certificate_no'=>$row['certificate_no'],
                 'batch'=>$row['batch'],
                 'start_date'=>$row['start_date'],
        ]);
    }

}
