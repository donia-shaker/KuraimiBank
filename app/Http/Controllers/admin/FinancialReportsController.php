<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\financial_reports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FinancialReportsController extends Controller
{
    function showreports(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $reports = financial_reports::select()->orderBy('id', 'DESC')->get();
        // dd($categories);
        return view('admin.reports', [
            'reports'  => $reports,
            'do'        => $do
        ]);
    }

    function addreports(Request $request){
        // return $request;
        Validator::validate($request->all(),[
            'titleAr'=>['required','string'],
            'titleEn'=>['required','string'],
            'descriptionAr'=>['required','string'],
            'descriptionEn'=>['required','string'],
            'file'=>['required'],
         ]);

         
        if($request->hasFile('file'))
        $file=$this->uploadFile($request->file('file'));

        $reports =  financial_reports::create([

            'title' => [
                'en'        =>      $request->titleEn,
                'ar'        =>      $request->titleAr
            ],
            'description' => [
                'en'        =>      $request->descriptionEn,
                'ar'        =>      $request->descriptionAr
            ],
            'pdf' =>$file
        ]);
        
        return redirect()->route('reports')->with(['success' => 'تمت الاضافه بنجاح']);
    }

    function editreports(Request $request,$id)
    {
        Validator::validate($request->all(),[
            'titleAr'=>['required','string'],
            'titleEn'=>['required','string'],
            'descriptionAr'=>['required','string'],
            'descriptionEn'=>['required','string'],
            'file'=>['required'],
        ]);

            
        if($request->hasFile('file'))
        $file=$this->uploadFile($request->file('file'));
        $reports =  financial_reports::find($id)->update([

            'title' => [
                'en'        =>      $request->titleEn,
                'ar'        =>      $request->titleAr
            ],
            'description' => [
                'en'        =>      $request->descriptionEn,
                'ar'        =>      $request->descriptionAr
            ],
            'pdf' =>$file
        ]);
        return redirect()->route('reports')->with(['success' => 'تم تعديل البيانات بنجاح']);
        
    }

    function activereports($id){
        $reports=financial_reports::find($id);
        if($reports->is_active )
            $reports->is_active=0;
        else 
            $reports->is_active=1;
        if($reports->save())
        return redirect()->back()->with(['success'=> 'تم تغيير الحالة بنجاح']);
    }

    public function deletereports($id)
    {
        $reports = financial_reports::find($id);
        // return $reports;
        if ($reports->delete()) 
        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);

    }
}
