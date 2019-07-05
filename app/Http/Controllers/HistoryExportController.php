<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\HistoryStore;

class HistoryExportController extends Controller implements FromCollection, WithHeadings
{
    use Exportable;
    public function collection()
    {
        $history = HistoryStore::all();
        foreach ($history as $row) {
            $order[] = array(
                '0' => $row->store_id,
                '1' => $row->product_id,
                '2' => $row->amount,
                '3' => $row->type
            );
        }

        return (collect($order));
    }

    public function headings(): array
    {
        return [
            'store_id',
            'product_id',
            'amount',
            'type'
        ];
    }

    public function export()
    {
        return Excel::download(new HistoryExportController(), 'history.xlsx');
    }
}
