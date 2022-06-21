<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\service_points;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicePointsController extends Controller
{
    function showServPoints($id){
        $servPoints = service_points::with(['city'])->where('city_id', $id)->orderBy('id', 'DESC')->get();
        return view('admin.servPoint.servPoint', [
            'servPoints' => $servPoints,
        ]);
    }

    function fetchServPoint($id)
    {
        $servPoints = service_points::with(['city'])->where('city_id', $id)->orderBy('id', 'DESC')->get();
        return $servPoints;
        return response()->json([
            'servPoints' => $servPoints,
            'locale'    => app()->getLocale()
        ]);
    }

    public function showAddServPoint(){
        return view('admin.servPoint.addServPoint');
    }
    function addServPoint(Request $request)
    {
        // return $request;
        // $validator = Validator::make($request->all(), [
        //     'nameEn' => ['required', 'string', 'between: 3, 30', 'unique:service_points,name'],
        //     'nameAr' => ['required', 'string', 'between: 3, 30', 'unique:service_points,name'],
        //     'addressAr' => ['required', 'string', 'between: 3, 30', 'unique:service_points,address'],
        //     'addressEn' => ['required', 'string', 'between: 3, 30', 'unique:service_points,address'],
        //     'phone' => ['required', 'string', 'between: 3, 30', 'unique:service_points,phone'],
        //     'secondPhone' => ['required', 'string', 'between: 3, 30', 'unique:service_points,secondPhone'],
        //     'workingHoursAr' => ['required', 'string', 'between: 3, 30', 'unique:service_points,workingHours'],
        //     'workingHoursEn' => ['required', 'string', 'between: 3, 30', 'unique:service_points,workingHours'],
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 400,
        //         'errors' => $validator->getMessageBag(),
        //     ]);
        // }
        //  else {
            $servPoint = new service_points;
            $nameData =  ['en' => $request->input('nameEn'), 'ar' => $request->input('nameAr')];
            $addressData =  ['en' => $request->input('addressEn'), 'ar' => $request->input('addressAr')];
            $workingHours =  ['en' => $request->input('workingHoursEn'), 'ar' => $request->input('workingHoursAr')];
            $servPoint->name = $nameData;
            $servPoint->address = $addressData;
            $servPoint->second_phone=$request->input('secondPhone');
            $servPoint->phone = $request->input('phone');
            $servPoint->working_hours = $workingHours;
            $servPoint->city_id = $request->input('cityId');
            if ($request->input('active') != null) {
                $servPoint->is_active = 1;
            }
            // return $servPoint;

            if ($servPoint->save())

                return response()->json(
                    [
                        // 'city'=> $city,
                        'status' => 200,
                        'message' => 'Data inserted successfully',
                    ]
                );
            // return $city->name;
        // }
    }

    public function editServPoint($id)
    {
        $servPoints = service_points::find($id);
        if($servPoints){
            return response()->json(
                [
                // 'category'=> $category,
                'status' => 200,
                'servPoints' => $servPoints,
                
                ]
            );
        }else {
            return response()->json(
                [
                // 'category'=> $category,
                'status' => 404,
                'message' =>'Data not Found',
                
                ]
            );
        }
    }

    public function updateServPoint(Request $request, $id)
    {
        // return $request;
        // $validator = Validator::make($request->all(), [
        //     'nameEn' => ['required', 'string', 'between: 3, 30', 'unique:service_points,name'],
        //     'nameAr' => ['required', 'string', 'between: 3, 30', 'unique:service_points,name'],
        //     'addressAr' => ['required', 'string', 'between: 3, 30', 'unique:service_points,address'],
        //     'addressEn' => ['required', 'string', 'between: 3, 30', 'unique:service_points,address'],
        //     'phone' => ['required', 'string', 'between: 3, 30', 'unique:service_points,phone'],
        //     'secondPhone' => ['required', 'string', 'between: 3, 30', 'unique:service_points,secondPhone'],
        //     'workingHoursAr' => ['required', 'string', 'between: 3, 30', 'unique:service_points,workingHours'],
        //     'workingHoursEn' => ['required', 'string', 'between: 3, 30', 'unique:service_points,workingHours'],
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 400,
        //         'errors' => $validator->getMessageBag(),
        //     ]);
        // }
        //  else {
            $servPoint = service_points::find($id);

            if ($servPoint) {
            $nameData =  ['en' => $request->input('nameEn'), 'ar' => $request->input('nameAr')];
            $addressData =  ['en' => $request->input('addressEn'), 'ar' => $request->input('addressAr')];
            $workingHours =  ['en' => $request->input('workingHoursEn'), 'ar' => $request->input('workingHoursAr')];
            $servPoint->name = $nameData;
            $servPoint->address = $addressData;
            $servPoint->second_phone=$request->input('secondPhone');
            $servPoint->phone = $request->input('phone');
            $servPoint->working_hours = $workingHours;
            $servPoint->city_id = $request->input('cityId');
            if ($request->input('active') != null) {
                $servPoint->is_active = 1;
            }
                // return $city;

                if ($servPoint->update()) {

                    return response()->json(
                        [
                            'status' => 200,
                            'message' => 'Data Update successfully',

                        ]
                    );
                    // return $city->name;
                } else {
                    return response()->json(
                        [
                            'status' => 404,
                            'message' => 'Data not Found',

                        ]
                    );
                }
            }
        }


    public function activeServPoint($id)
    {
        $ServPoint = service_points::find($id);

        if ($ServPoint->is_active)
            $ServPoint->is_active = 0;
        else
            $ServPoint->is_active = 1;
        if ($ServPoint->save()) {
            return response()->json(
                [
                    'active' => $ServPoint,
                    'status' => 200,
                    'message' => 'Data Update successfully',

                ]
            );
            // return $ServPoint->name;
        } else {
            return response()->json(
                [
                    'status' => 404,
                    'message' => 'Data not Found',

                ]
            );
        }
    }

    public function deleteServPoint($id)
    {
        $ServPoint = service_points::find($id);
        if ($ServPoint->delete()) {
            return response()->json(
                [
                    'active' => $ServPoint,
                    'status' => 200,
                    'message' => 'Data Delete successfully',

                ]
            );
            // return $ServPoint->name;
        } else {
            return response()->json(
                [
                    'status' => 404,
                    'message' => 'Data not Found',

                ]
            );
        }
    }
}
