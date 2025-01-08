<?php

namespace App\Http\Controllers\Backend\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserExportController extends Controller
{
    public function exportExcel(Request $request)
    {
        // $search = $request->search;
        // return Excel::download(new UsersExport($search), 'user_list.xlsx');
    }
    public function exportPDF(){

    }
}
