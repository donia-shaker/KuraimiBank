<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    function shownews(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $news = news::select()->orderBy('id', 'DESC')->get();
        // dd($categories);
        return view('admin.news', [
            'news'  => $news,
            'do'        => $do
        ]);
    }

    function addNews(Request $request){
        // return $request;
        Validator::validate($request->all(),[
            'titleAr'=>['required','string'],
            'titleEn'=>['required','string'],
            'descriptionAr'=>['required','string'],
            'descriptionEn'=>['required','string'],
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
            'background_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
        ]);

        if($request->hasFile('image'))
            $image=$this->uploadFile($request->file('image'));
        if($request->hasFile('background_image'))
            $background_image=$this->uploadFile($request->file('background_image'));

        $news =  news::create([

            'title' => [
                'en'        =>      $request->titleEn,
                'ar'        =>      $request->titleAr
            ],
            'description' => [
                'en'        =>      $request->descriptionEn,
                'ar'        =>      $request->descriptionAr
            ],
            'image'             =>  $image,
            'background_image'  =>  $background_image,
        ]);
        
        return redirect()->route('news')->with(['success' => 'Data Insert Successfully']);
    }

    function editNews(Request $request,$id)
    {
        Validator::validate($request->all(),[
            'titleAr'=>['required','string'],
            'titleEn'=>['required','string'],
            'descriptionAr'=>['required','string'],
            'descriptionEn'=>['required','string'],
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
            'background_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
        ]);

        if($request->hasFile('image'))
            $image=$this->uploadFile($request->file('image'));
        if($request->hasFile('background_image'))
            $background_image=$this->uploadFile($request->file('background_image'));

        $news =  news::find($id)->update([

            'title' => [
                'en'        =>      $request->titleEn,
                'ar'        =>      $request->titleAr
            ],
            'description' => [
                'en'        =>      $request->descriptionEn,
                'ar'        =>      $request->descriptionAr
            ],
            'image'             =>  $image,
            'background_image'  =>  $background_image,
        ]);
        return redirect()->route('news')->with(['success' => 'Data Update Successfully']);
        
    }

    function activeNews($id){
        $news=news::find($id);
        if($news->is_active )
            $news->is_active=0;
        else 
            $news->is_active=1;
        if($news->save())
        return redirect()->back()->with(['success'=> 'Position Change Successfuly']);
    }

    public function deleteNews($id)
    {
        $news = news::find($id);
        if ($news->delete()) 
        return redirect()->back()->with(['success' => 'Data Delete successfully']);

    }
}
