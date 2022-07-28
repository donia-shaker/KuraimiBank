<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\our_partiners;
use App\Models\services;
use Illuminate\Http\Request;

class CompaniesPageController extends Controller
{
    function showCompaniesPage(){
        $main_categories = categories::select()->where('parentId', '0')->where('is_active', 1)->get();
        $all_categories = categories::select()->where('parentId','!=', '0')->where('is_active', 1)->get();
        $services = services::select()->orderBy('id', 'DESC')->get();
        $banks = our_partiners::select()->where('is_active', 1)->get();
        return view('web.companies',[
            'main_categories' => $main_categories ,
            'all_categories'  => $all_categories,
            'services'  => $services,
            'banks'  => $banks,

        ]);
    }
}
