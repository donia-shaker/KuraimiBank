<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\servises;
use App\Models\servises_advantages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServisesAdvantagesController extends Controller
{
    function showServiceAdv($id){
        // return $id;

        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $servId = isset($_GET['servId']) ? $servId = $_GET['servId'] : 'Manage';

        $serviceAdv=servises_advantages::with(['servises'])->where('service_id',$id)->get();
        // $serviceIdNum = servises::select()->where('id',$id)->get();

        return view('admin.servicesAdv', [
            'serviceAdventages'  => $serviceAdv,
            'servId' =>$servId,
            'serviceId' => $id,
            'do'        => $do
        ]);
    }

    function addServiceAdv(Request $request){
        // return $request;
        Validator::validate($request->all(),[
            'nameAr'=>['required','string'],
            'nameEn'=>['required','string'],
            'serviceId'=>['required'],
            'icon'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
        ]);

        if($request->hasFile('icon'))
            $icon=$this->uploadFile($request->file('icon'));

        $serviceAdv =  servises_advantages::create([
            'name' => [
                'en'        =>      $request->nameEn,
                'ar'        =>      $request->nameAr
            ],
            'icon'          =>  $icon,
            'service_id '    =>  $request->serviceId
        ]);
        
        return redirect()->route('serviceAdv')->with(['success' => 'Data Insert Successfully']);
    }

    // function editService(Request $request,$id)
    // {
    //     Validator::validate($request->all(),[
    //         'nameAr'=>['required','string'],
    //         'nameEn'=>['required','string'],
    //         'descriptionAr'=>['required','string'],
    //         'descriptionEn'=>['required','string'],
    //         'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
    //         'background_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
    //         'other_adventageAr'=>['required','string'],
    //         'other_adventageEn'=>['required','string'],
    //         'service_conditionsAr'=>['required','string'],
    //         'service_conditionsEn'=>['required','string'],
    //     ]);

    //     if($request->hasFile('image'))
    //         $image=$this->uploadFile($request->file('image'));
    //     if($request->hasFile('background_image'))
    //         $background_image=$this->uploadFile($request->file('background_image'));

    //     $service =  servises::find($id)->update([

    //         'name' => [
    //             'en'        =>      $request->nameEn,
    //             'ar'        =>      $request->nameAr
    //         ],
    //         'description' => [
    //             'en'        =>      $request->descriptionEn,
    //             'ar'        =>      $request->descriptionAr
    //         ],
    //         'other_adventage'   => [
    //             'en'        =>      $request->other_adventageEn,
    //             'ar'        =>      $request->other_adventageAr
    //         ] ,
    //         'service_conditions'  => [
    //             'en'        =>      $request->service_conditionsEn,
    //             'ar'        =>      $request->service_conditionsAr
    //         ],
    //         'image'             =>  $image,
    //         'background_image'  =>  $background_image,
    //         'category_id'       =>  $request->categoryId,
    //     ]);
    //     return redirect()->route('services')->with(['success' => 'Data Update Successfully']);
        
    // }

    // function positionService($id){
    //     $service=servises::find($id);
    //     if($service->position )
    //         $service->position=0;
    //     else 
    //         $service->position=1;
    //     if($service->save())
    //     return redirect()->back()->with(['success'=> 'Position Change Successfuly']);
    // }

    // public function deleteService($id)
    // {
    //     $service = servises::find($id);
    //     if ($service->delete()) 
    //     return redirect()->back()->with(['success' => 'Data Delete successfully']);

    // }
}
