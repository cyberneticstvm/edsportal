<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    function exportProduct(Request $request)
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }
}
