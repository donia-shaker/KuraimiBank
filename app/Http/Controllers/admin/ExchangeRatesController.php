<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\exchange_rates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExchangeRatesController extends Controller
{
    function showRate(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $rate = exchange_rates::select()->orderBy('id', 'DESC')->get();
        // dd($categories);
        return view('admin.ExchangeRate', [
            'rate'  => $rate,
            'do'        => $do
        ]);
    }

    function addrate(Request $request){
        // return $request;
        Validator::validate($request->all(),[
            'nameAr'=>['required','string'],
            'nameEn'=>['required','string'],
            'buy'=>['required'],
            'sale'=>['required'],
        ]);
        $rate =  exchange_rates::create([

            'name' => [
                'en'        =>      $request->nameEn,
                'ar'        =>      $request->nameAr
            ],
            'buy'             =>  $request->buy,
            'sale'            =>  $request->sale,
        ]);
        
        return redirect()->route('rate')->with(['success' => 'Data Insert Successfully']);
    }

    function editRate(Request $request,$id)
    {
        Validator::validate($request->all(),[
            'nameAr'=>['required','string'],
            'nameEn'=>['required','string'],
            'buy'=>['required'],
            'sale'=>['required'],
        ]);
        $rate =  exchange_rates::find($id)->update([

            'name' => [
                'en'        =>      $request->nameEn,
                'ar'        =>      $request->nameAr
            ],
            'buy'             =>  $request->buy,
            'sale'            =>  $request->sale,
        ]);
        return redirect()->route('rate')->with(['success' => 'Data Update Successfully']);
        
    }

    function activeRate($id){
        $rate=exchange_rates::find($id);
        if($rate->is_active )
            $rate->is_active=0;
        else 
            $rate->is_active=1;
        if($rate->save())
        return redirect()->back()->with(['success'=> 'Position Change Successfuly']);
    }

    public function deleteRate($id)
    {
        $rate = exchange_rates::find($id);
        if ($rate->delete()) 
        return redirect()->back()->with(['success' => 'Data Delete successfully']);

    }
}
