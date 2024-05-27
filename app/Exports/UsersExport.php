<?php

namespace App\Exports;

use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\View\View;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\FromView;

use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;


class UsersExport implements FromView

{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        return view('exports.users',[
            'users' => User::all()
        ]);
        
    }
};
// class UsersExport implements FromQuery, WithHeadings
// {   
//     public function headings(): array
//     {
//         return [
//             '#',
//             'User',
//             'Date',
//         ];
//     }
// }

