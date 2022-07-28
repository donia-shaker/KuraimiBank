<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\services;
use App\Models\social_media;
use Illuminate\Http\Request;

class ContactUsPageController extends Controller
{
    function showContactUsPage(){
        $main_categories = categories::select()->where('parentId', '0')->where('is_active', 1)->get();
        $all_categories = categories::select()->where('parentId','!=', '0')->where('is_active', 1)->get();
        $services = services::select()->orderBy('id', 'DESC')->get();
        $social = social_media::select()->where('is_active', 1)->get();
        return view('web.contact_us',[
            'main_categories' => $main_categories ,
            'all_categories'  => $all_categories,
            'services'  => $services,
            'social'    =>$social

        ]);
    }
}
