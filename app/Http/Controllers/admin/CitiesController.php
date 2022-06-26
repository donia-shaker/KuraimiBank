<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\cities;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function showcities($id){
        $cities=cities::with(['country'])->where('country_id',$id)->get();
        // return $cities;
        return view('admin.cities')->with([
            'cities' => $cities ,
            'locale'    => app()->getLocale()
        ]);
    }

    function fetchCities($id){
        $cities=cities::with(['country'])->where('country_id',$id)->get();
        return response()->json([
            'cities' => $cities ,
            'locale'    => app()->getLocale()
        ]);
    }

    function addCity(Request $request){
        // return $request;
        $validator = Validator::make($request->all(),[
            'nameEn'=>['required','string', 'between: 3, 30', 'unique:cities,name'],
            'nameAr'=>['required','string', 'between: 3, 30', 'unique:cities,name'],
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else{
            $city=new cities;
            $data =  ['en' => $request->input('nameEn'),'ar' => $request->input('nameAr')];
            $city->name = json_encode($data) ;
            $city->country_id = $request->input('countryId') ;

            if($request->input('active') != null){
                $city->is_active=1;
            }
            // return $city;

            if($city->save())
            
            return response()->json(
                [
                // 'city'=> $city,
                'status' => 200,
                'message' => 'Data inserted successfully',
                
                ]
            );
            // return $city->name;
        }
    }

    public function editCity( $id){
        $city = cities::find($id);
        if($city){
            return response()->json(
                [
                'status' => 200,
                'city' => $city,
                
                ]
            );
        }else {
            return response()->json(
                [
                // 'city'=> $city,
                'status' => 404,
                'message' =>'Data not Found',
                
                ]
            );
        }

    }

    public function updateCity(Request $request , $id){
        //  return $request;
         $validator = Validator::make($request->all(),[
            'nameEn'=>['required','string', 'between: 3, 30', 'unique:cities,name'],
            'nameAr'=>['required','string', 'between: 3, 30', 'unique:cities,name'],
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else{
            $city= cities::find($id);

            if($city){
                $data =  ['en' => $request->input('nameEn'),'ar' => $request->input('nameAr')];
                $city->name = json_encode($data) ;
                $city->country_id = $request->input('countryId') ;    
                // if($request->input('active') != null){
                //     $city->is_active=1;
                // }
                // return $city;
    
                if($city->update()){
                
                    return response()->json(
                        [
                        'status' => 200,
                        'message' => 'Data Update successfully',
                        
                        ]
                    );
                // return $city->name;
            }else {
                return response()->json(
                    [
                    'status' => 404,
                    'message' =>'Data not Found',
                    
                    ]
                );
                }
            }
        }
    }

    public function activeCity($id){
        $city = cities::find($id);

        if($city->is_active )
            $city->is_active=0;
        else 
            $city->is_active=1;
        if($city->save()){
            return response()->json(
                [
                'active'=> $city,
                'status' => 200,
                'message' => 'Data Update successfully',
                    
                    ]
                );
            // return $city->name;
            }else {
                return response()->json(
                    [
                    'status' => 404,
                    'message' =>'Data not Found',
                    
                    ]
                );
                }
        }

        public function deleteCity($id){
            $city = cities::find($id);
            if($city->delete()){
                return response()->json(
                [
                'active'=> $city,
                'status' => 200,
                'message' => 'Data Delete successfully',
                    
                    ]
                );
            // return $city->name;
            }else {
                return response()->json(
                    [
                    'status' => 404,
                    'message' =>'Data not Found',
                    
                    ]
                );
                }
        }
}
