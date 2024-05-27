<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Log::info($row);
        return new User([
            'id_person' => $row[0],
            "name" => $row[1],
            "otdel" => $row[2],
            "classification" => $row[3],
            "potok_number" => $row[4],
            "earning" => $row[5],
            "transport" => $row[6],
            "JSHSHIR" => $row[7],
            "KIM_vidan" => $row[8],
            "seriya" => $row[9],
            "Pass_vidan" => $row[10],
            "birth" => $row[11],
            "street" => $row[12],
            "Prikaz_nomer" => $row[13],
            "Ish_olingan" => $row[14],  
            "letters" => $row[15],  
            "phone_num" => $row[16],
            "gender" => $row[17],  
            'created_at' => Carbon::now(),
        ]);
    }
}