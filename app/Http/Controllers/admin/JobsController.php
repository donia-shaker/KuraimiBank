<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobsController extends Controller
{
    function showjobs(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $jobs = jobs::select()->orderBy('id', 'DESC')->get();
        // dd($categories);
        return view('admin.jobs', [
            'jobs'  => $jobs,
            'do'        => $do
        ]);
    }

    function addjobs(Request $request){
        // return $request;
        Validator::validate($request->all(),[
            'titleAr'=>['required','string'],
            'titleEn'=>['required','string'],
            'descriptionAr'=>['required','string'],
            'descriptionEn'=>['required','string'], ]);

        $jobs =  jobs::create([

            'title' => [
                'en'        =>      $request->titleEn,
                'ar'        =>      $request->titleAr
            ],
            'description' => [
                'en'        =>      $request->descriptionEn,
                'ar'        =>      $request->descriptionAr
            ],
        ]);
        
        return redirect()->route('jobs')->with(['success' => 'تمت الاضافه بنجاح']);
    }

    function editjobs(Request $request,$id)
    {
        Validator::validate($request->all(),[
            'titleAr'=>['required','string'],
            'titleEn'=>['required','string'],
            'descriptionAr'=>['required','string'],
            'descriptionEn'=>['required','string'],]);

        $jobs =  jobs::find($id)->update([

            'title' => [
                'en'        =>      $request->titleEn,
                'ar'        =>      $request->titleAr
            ],
            'description' => [
                'en'        =>      $request->descriptionEn,
                'ar'        =>      $request->descriptionAr
            ],
        ]);
        return redirect()->route('jobs')->with(['success' => 'تم تعديل البيانات بنجاح']);
        
    }

    function activejobs($id){
        $jobs=jobs::find($id);
        if($jobs->is_active )
            $jobs->is_active=0;
        else 
            $jobs->is_active=1;
        if($jobs->save())
        return redirect()->back()->with(['success'=> 'تم تغيير الحالة بنجاح']);
    }

    public function deletejobs($id)
    {
        $jobs = jobs::find($id);
        // return $jobs;
        if ($jobs->delete()) 
        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);

    }
}
