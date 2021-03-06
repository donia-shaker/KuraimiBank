<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\financial_reports;
use App\Models\services;
use Illuminate\Http\Request;

class ReportsPageController extends Controller
{
    function showReportPage(){
        $main_categories = categories::select()->where('parentId', '0')->where('is_active', 1)->get();
        $all_categories = categories::select()->where('parentId','!=', '0')->where('is_active', 1)->get();
        $services = services::select()->orderBy('id', 'DESC')->get();
        $reports = financial_reports::select()->where('is_active', 1)->orderBy('id', 'DESC')->get();
        return view('web.reports',[
            'main_categories' => $main_categories ,
            'all_categories'  => $all_categories,
            'services'  => $services,
            'reports'   => $reports

        ]);
    }
}
