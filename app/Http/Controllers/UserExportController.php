<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\User;

class UserExportController extends Controller implements FromCollection, WithHeadings
{
    protected $userRepository;

    public function collection()
    {
        $user = User::All();
        foreach ($user as $row) {
            $order[] = array(
                '0' => $row->username,
                '1' => $row->email,
                '2' => $row->created_at
            );
        }

        return (collect($order));
    }

    public function headings(): array
    {
        return [
            'username',
            'email',
            'thoi gian',
        ];
    }

    public function export()
    {
        return Excel::download(new UserExportController(), 'user.xlsx');
    }
}
