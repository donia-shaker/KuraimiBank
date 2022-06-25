<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    function showpages(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $pages = pages::select()->orderBy('id', 'DESC')->get();
        // dd($categories);
        return view('admin.pages', [
            'pages'  => $pages,
            'do'        => $do
        ]);
    }

    function addpages(Request $request){
        // return $request;
        Validator::validate($request->all(),[
            'titleAr'=>['required','string'],
            'titleEn'=>['required','string'],
            'subTitleAr'=>['required','string'],
            'subTitleEn'=>['required','string'],
            'descriptionAr'=>['required','string'],
            'descriptionEn'=>['required','string'],]);

        $pages =  pages::create([

            'title' => [
                'en'        =>      $request->titleEn,
                'ar'        =>      $request->titleAr
            ],
            'sub_title' => [
                'en'        =>      $request->subTitleEn,
                'ar'        =>      $request->subTitleAr
            ],
            'description' => [
                'en'        =>      $request->descriptionEn,
                'ar'        =>      $request->descriptionAr
            ],
        ]);
        
        return redirect()->route('pages')->with(['success' => 'Data Insert Successfully']);
    }

    function editpages(Request $request,$id)
    {
        Validator::validate($request->all(),[
            'titleAr'=>['required','string'],
            'titleEn'=>['required','string'],
            'subTitleAr'=>['required','string'],
            'subTitleEn'=>['required','string'],
            'descriptionAr'=>['required','string'],
            'descriptionEn'=>['required','string'],]);

        if($request->hasFile('image'))
            $image=$this->uploadFile($request->file('image'));
        if($request->hasFile('background_image'))
            $background_image=$this->uploadFile($request->file('background_image'));

        $pages =  pages::find($id)->update([

            'title' => [
                'en'        =>      $request->titleEn,
                'ar'        =>      $request->titleAr
            ],
            'sub_title' => [
                'en'        =>      $request->subTitleEn,
                'ar'        =>      $request->subTitleAr
            ],
            'description' => [
                'en'        =>      $request->descriptionEn,
                'ar'        =>      $request->descriptionAr
            ],
        ]);
        return redirect()->route('pages')->with(['success' => 'Data Update Successfully']);
        
    }

    function activepages($id){
        $pages=pages::find($id);
        if($pages->is_active )
            $pages->is_active=0;
        else 
            $pages->is_active=1;
        if($pages->save())
        return redirect()->back()->with(['success'=> 'Position Change Successfuly']);
    }

    public function deletepages($id)
    {
        $pages = pages::find($id);
        if ($pages->delete()) 
        return redirect()->back()->with(['success' => 'Data Delete successfully']);

    }
}
