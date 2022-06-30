<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\services_advantages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class servicesAdvantagesController extends Controller
{
    function showServiceAdv($id){
        // return $id;

        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $servId = isset($_GET['servId']) ? $servId = $_GET['servId'] : 'Manage';

        $serviceAdv=services_advantages::with(['service'])->where('service_id',$id)->get();
        $allServiceAdv=services_advantages::get();

        return view('admin.servicesAdv', [
            'serviceAdventages'  => $serviceAdv,
            'servId' =>$servId,
            'serviceId' => $id,
            'do'        => $do,
            'allServAdv'=> $allServiceAdv
        ]);
    }

    function addServiceAdv(Request $request){
        // return $request;
        Validator::validate($request->all(),[
            'nameAr'=>['required','string'],
            'nameEn'=>['required','string'],
            'icon'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
        ]);

        if($request->hasFile('icon'))
            $icon=$this->uploadFile($request->file('icon'));

        $serviceAdv =  services_advantages::create([
            'name' => [
                'en'        =>      $request->nameEn,
                'ar'        =>      $request->nameAr
            ],
            'icon'          =>  $icon,
            'service_id'    => $request->serviceId
        ]);
        
        return redirect()->route('serviceAdv',$request->serviceId)->with(['success' => 'تمت الاضافه بنجاح']);
    }

    function updateServiceAdv(Request $request,$id)
    {
        Validator::validate($request->all(),[
            'nameAr'=>['required','string'],
            'nameEn'=>['required','string'],
            'icon'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',
        ]);

        if($request->hasFile('icon'))
        $icon=$this->uploadFile($request->file('icon'));

        $service =  services_advantages::find($id)->update([

            'name' => [
                'en'        =>      $request->nameEn,
                'ar'        =>      $request->nameAr
            ],
            'icon'          =>  $icon,
            'service_id'    => $request->serviceId
        ]);

    return redirect()->route('serviceAdv',$request->serviceId)->with(['success' => 'تم تعديل البيانات بنجاح']);
        
    }

    function activeServiceAdv($id){
        $service=services_advantages::find($id);
        if($service->is_active )
            $service->is_active=0;
        else 
            $service->is_active=1;
        if($service->save())
        return redirect()->back()->with(['success'=> 'تم تغيير الحالة بنجاح']);
    }

    public function deleteServiceAdv($id)
    {
        $service = services_advantages::find($id);
        if ($service->delete()) 
        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);

    }
}
