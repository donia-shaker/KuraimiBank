<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\our_partiners;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OurPartinersController extends Controller
{
    function showpartiners(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $partiners = our_partiners::select()->orderBy('id', 'DESC')->get();
        // dd($categories);
        return view('admin.partiners', [
            'partiners'  => $partiners,
            'do'        => $do
        ]);
    }

    function addpartiners(Request $request){
        // return $request;
        Validator::validate($request->all(),[
            'titleAr'=>['required','string'],
            'titleEn'=>['required','string'],
            'descriptionAr'=>['required','string'],
            'descriptionEn'=>['required','string'],
            'image'=>['required'],
         ]);

         
        if($request->hasFile('image'))
        $image=$this->uploadFile($request->file('image'));

        $partiners =  our_partiners::create([

            'title' => [
                'en'        =>      $request->titleEn,
                'ar'        =>      $request->titleAr
            ],
            'description' => [
                'en'        =>      $request->descriptionEn,
                'ar'        =>      $request->descriptionAr
            ],
            'image' =>$image
        ]);
        
        return redirect()->route('partiners')->with(['success' => 'Data Insert Successfully']);
    }

    function editpartiners(Request $request,$id)
    {
        Validator::validate($request->all(),[
            'titleAr'=>['required','string'],
            'titleEn'=>['required','string'],
            'descriptionAr'=>['required','string'],
            'descriptionEn'=>['required','string'],
            'image'=>['required'],
        ]);

            
        if($request->hasFile('image'))
        $image=$this->uploadFile($request->file('image'));
        $partiners =  our_partiners::find($id)->update([

            'title' => [
                'en'        =>      $request->titleEn,
                'ar'        =>      $request->titleAr
            ],
            'description' => [
                'en'        =>      $request->descriptionEn,
                'ar'        =>      $request->descriptionAr
            ],
            'image' =>$image
        ]);
        return redirect()->route('partiners')->with(['success' => 'Data Update Successfully']);
        
    }

    function activepartiners($id){
        $partiners=our_partiners::find($id);
        if($partiners->is_active )
            $partiners->is_active=0;
        else 
            $partiners->is_active=1;
        if($partiners->save())
        return redirect()->back()->with(['success'=> 'Position Change Successfuly']);
    }

    public function deletepartiners($id)
    {
        $partiners = our_partiners::find($id);
        // return $partiners;
        if ($partiners->delete()) 
        return redirect()->back()->with(['success' => 'Data Delete successfully']);

    }
}
