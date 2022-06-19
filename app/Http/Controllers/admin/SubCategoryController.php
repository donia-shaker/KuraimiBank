<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    // function showSubCategory(){
    //     return view('admin.subCategory');
    // }

    public function showSubCategory($id){
        // $subCategory = categories::select()->where('parentId',$id)->get();
        return view('admin.subCategory');
        // return response()->json([
        //     'categories' => $subCategory ,
        //     'locale'    => app()->getLocale()
        // ]);
    }


}