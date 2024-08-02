<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Billing;

class HomeController
{
    public function index()
    {
        return view('home');
    }
    public function show()
    {
        return view('admin.report.index');
    }
    public function get_report(Request $request)
    {
        $dateFrom = $request->get('start_date');
        $dateTo = $request->get('end_date');
        $customerName = $request->customer_info;
        $query = Billing::whereDate('created_at', '>=', $dateFrom)->whereDate('created_at', '<=', $dateTo);
        if ($request->customer_info != '') { 
            $query = $query->where('customer_name', 'like', '%'.$customerName.'%')->orWhere('customer_phone', 'like', '%'.$customerName.'%');
        }
        $query = $query->get();
        $html = view('admin.report.render',compact('query'))->render();
        return $html;
      }
    
}
