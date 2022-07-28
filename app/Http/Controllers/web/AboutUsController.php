<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\services;
use App\Models\website_info;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    function showAboutUsPage(){
        $main_categories = categories::select()->where('parentId', '0')->where('is_active', 1)->get();
        $all_categories = categories::select()->where('parentId','!=', '0')->where('is_active', 1)->get();
        $services = services::select()->orderBy('id', 'DESC')->get();
        $about_bank = website_info::select()->where('id' ,'<',6)->get();
        $principles = website_info::select()->where('id' ,'>',5)->get();
        return view('web.about_us',[
            'main_categories' => $main_categories ,
            'all_categories'  => $all_categories,
            'services'  => $services,
            'about_bank' => $about_bank,
            'principles' => $principles

        ]);
    }
}
