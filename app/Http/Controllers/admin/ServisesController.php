<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\servises;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServisesController extends Controller
{
    function showServices(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $categories = categories::where('parentId' ,'!=',' 0')->get();
        $services = servises::select()->orderBy('id', 'DESC')->get();
        // dd($categories);
        return view('admin.services', [
            'services'  => $services,
            'categories' => $categories,
            'do'        => $do
        ]);
    }

    function addService(Request $request){
        // return $request;
        Validator::validate($request->all(),[
            'nameAr'=>['required','string'],
            'nameEn'=>['required','string'],
            'descriptionAr'=>['required','string'],
            'descriptionEn'=>['required','string'],
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
            'background_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
            'other_adventageAr'=>['required','string'],
            'other_adventageEn'=>['required','string'],
            'service_conditionsAr'=>['required','string'],
            'service_conditionsEn'=>['required','string'],
        ]);

        if($request->hasFile('image'))
            $image=$this->uploadFile($request->file('image'));
        if($request->hasFile('background_image'))
            $background_image=$this->uploadFile($request->file('background_image'));

        $service =  servises::create([

            'name' => [
                'en'        =>      $request->nameEn,
                'ar'        =>      $request->nameAr
            ],
            'description' => [
                'en'        =>      $request->descriptionEn,
                'ar'        =>      $request->descriptionAr
            ],
            'other_adventage'   => [
                'en'        =>      $request->other_adventageEn,
                'ar'        =>      $request->other_adventageAr
            ] ,
            'service_conditions'  => [
                'en'        =>      $request->service_conditionsEn,
                'ar'        =>      $request->service_conditionsAr
            ],
            'image'             =>  $image,
            'background_image'  =>  $background_image,
            'category_id'       =>  $request->categoryId,
        ]);
        
        return redirect()->route('services')->with(['success' => 'Data Insert Successfully']);
    }

    function editService(Request $request,$id)
    {
        Validator::validate($request->all(),[
            'nameAr'=>['required','string'],
            'nameEn'=>['required','string'],
            'descriptionAr'=>['required','string'],
            'descriptionEn'=>['required','string'],
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
            'background_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
            'other_adventageAr'=>['required','string'],
            'other_adventageEn'=>['required','string'],
            'service_conditionsAr'=>['required','string'],
            'service_conditionsEn'=>['required','string'],
        ]);

        if($request->hasFile('image'))
            $image=$this->uploadFile($request->file('image'));
        if($request->hasFile('background_image'))
            $background_image=$this->uploadFile($request->file('background_image'));

        $service =  servises::find($id)->update([

            'name' => [
                'en'        =>      $request->nameEn,
                'ar'        =>      $request->nameAr
            ],
            'description' => [
                'en'        =>      $request->descriptionEn,
                'ar'        =>      $request->descriptionAr
            ],
            'other_adventage'   => [
                'en'        =>      $request->other_adventageEn,
                'ar'        =>      $request->other_adventageAr
            ] ,
            'service_conditions'  => [
                'en'        =>      $request->service_conditionsEn,
                'ar'        =>      $request->service_conditionsAr
            ],
            'image'             =>  $image,
            'background_image'  =>  $background_image,
            'category_id'       =>  $request->categoryId,
        ]);
        return redirect()->route('services')->with(['success' => 'Data Update Successfully']);
        
    }

    function positionService($id){
        $service=servises::find($id);
        if($service->position )
            $service->position=0;
        else 
            $service->position=1;
        if($service->save())
        return redirect()->back()->with(['success'=> 'Position Change Successfuly']);
    }

    function activeService($id){
        $service=servises::find($id);
        if($service->is_active )
            $service->is_active=0;
        else 
            $service->is_active=1;
        if($service->save())
        return redirect()->back()->with(['success'=> 'Position Change Successfuly']);
    }

    public function deleteService($id)
    {
        $service = servises::find($id);
        if ($service->delete()) 
        return redirect()->back()->with(['success' => 'Data Delete successfully']);

    }
    
}
