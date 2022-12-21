<?php

namespace App\Imports;
use App\student;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class studentImport implements ToModel,WithHeadingRow
{
    use SerializesModels;
    public function model(array $row )
    {

        return new student([
                 'reg_number' => $row['reg_number'],
                 'fullname' => $row['fullname'],
                 'nic'=>$row['nic'],
        ]);
    }
}
