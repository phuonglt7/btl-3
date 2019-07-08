<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\HistoryStore;

class HistoryExport implements FromCollection, WithHeadings
{
    protected $id;
    public function __construct($id){
        $this->id = $id;
    }

    public function collection()
    {
        $history = HistoryStore::where('store_id', $this->id)->get();
        foreach ($history as $row) {
            $order[] = array(
                '0' => $row->store_id,
                '1' => $row->product_id,
                '2' => $row->amount,
                '3' => $row->created_at
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

}
