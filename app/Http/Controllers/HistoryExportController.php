<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Excel;
use App\HistoryStore;
use App\Exports\HistoryExport;

class HistoryExportController extends Controller
{
    public function export($id)
    {
        return Excel::download(new HistoryExport($id), 'history.xlsx');
    }
}
