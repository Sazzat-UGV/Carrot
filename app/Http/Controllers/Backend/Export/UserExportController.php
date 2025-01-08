<?php

namespace App\Http\Controllers\Backend\Export;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserExportController extends Controller
{
    public function exportExcel(Request $request)
    {
        $search = $request->search;
        return Excel::download(new UsersExport($search), 'user_list.xlsx');
    }

    public function exportPDF(Request $request)
    {
        $search = $request->search;
        $users = User::where('role', 'User')->when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%");
            });
        })
            ->get();
        $generalSetting = GeneralSetting::find(1);
        $site_logo = $generalSetting->site_logo;
        $site_name = $generalSetting->site_name ?? config('app.name');
        $pdf = Pdf::loadView('backend.pages.export.user_list', compact('users', 'site_logo', 'site_name'));
        return $pdf->setPaper('a4', 'portrait')->download('user_list.pdf');
    }
}
