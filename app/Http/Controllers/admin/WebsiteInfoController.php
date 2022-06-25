<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\website_info;
use Illuminate\Http\Request;

class WebsiteInfoController extends Controller
{
    public function website(){
        $webSiteInfo = website_info::get();
        return view('admin.website',[ 
            'webSiteInfo'  => $webSiteInfo]);
    }
}
