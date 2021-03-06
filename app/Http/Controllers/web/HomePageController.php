<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\services;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function showHomePage(){
        $main_categories = categories::select()->where('parentId', '0')->where('is_active', 1)->get();
        $all_categories = categories::select()->where('parentId','!=', '0')->where('is_active', 1)->get();
        $services = services::select()->orderBy('id', 'DESC')->get();
        return view('web.homePage',[
            'main_categories' => $main_categories ,
            'all_categories'  => $all_categories,
            'services'  => $services,

        ]);
    }
}
