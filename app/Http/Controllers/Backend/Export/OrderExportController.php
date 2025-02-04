<?php
namespace App\Http\Controllers\Backend\Export;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrderExportController extends Controller
{
    public function exportPDF(Request $request)
    {
        $orders = Order::latest('id');
        if ($request->search) {
            $orders = $orders->where('order_id', 'LIKE', '%' . $request->search . '%')
                ->orWhere('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('email', 'LIKE', '%' . $request->search . '%');
        }
        if ($request->date) {
            $orders = $orders->whereDate('created_at', $request->date);
        }
        $orders = $orders->when($request->payment_type && $request->payment_type != 'All', function ($query) use ($request) {
            return $query->where('payment_type', $request->payment_type);
        });

        $orders = $orders->when($request->status && $request->status != 'All', function ($query) use ($request) {
            return $query->where('status', $request->status);
        });
        $orders         = $orders->get();
        $generalSetting = GeneralSetting::find(1);
        $site_logo      = $generalSetting->site_logo;
        $site_name      = $generalSetting->site_name ?? config('app.name');
        $pdf            = Pdf::loadView('backend.pages.export.order_list', compact('orders', 'site_logo', 'site_name'));
        return $pdf->setPaper('a4', 'landscape')->download('order_list.pdf');
    }
}
