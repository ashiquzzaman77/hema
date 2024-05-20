<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use DateTime;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    //All Report
    public function AllReport()
    {
        return view('admin.backend.report.all_report');
    }

    //Search Date
    public function SearchDate(Request $request)
    {
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');

        $orders = Order::where('order_date', $formatDate)->latest()->get();

        return view('admin.backend.report.search_by_date', compact('orders', 'formatDate'));
    }

    //Search By Month
    public function SearchMonth(Request $request)
    {
        $month = $request->month;
        $year = $request->year;

        $orders = Order::where('order_month', $month)->where('order_year', $year)->latest()->get();

        return view('admin.backend.report.search_by_month',compact('orders','month'));
    }


    //Search Year
    public function SearchYear(Request $request)
    {
        $year = $request->year;

        $orders = Order::where('order_year', $year)->latest()->get();

        return view('admin.backend.report.search_by_year', compact('orders', 'year'));
    }

}
