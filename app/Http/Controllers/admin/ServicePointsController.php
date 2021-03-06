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
        return view('admin.servPoints', [
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
        $validator = Validator::make($request->all(), [
            'nameEn' => ['required', 'string', 'between: 3, 255'],
            'nameAr' => ['required', 'string', 'between: 3, 255'],
            'addressAr' => ['required', 'string', 'between: 3, 255'],
            'addressEn' => ['required', 'string', 'between: 3, 255'],
            'phone' => ['required', 'between: 3, 255'],
            'secondPhone' => ['required', 'between: 3, 255'],
            'workingHoursAr' => ['required', 'string', 'between: 3, 255'],
            'workingHoursEn' => ['required', 'string', 'between: 3, 255'],
            'lat'=>['required'],
            'lng'=>['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        }
        else {
            $servPoint =  service_points::create([
                'name'   =>  [
                    'en' => $request->nameEn,
                    'ar' => $request->nameAr
                ],
                'address'=> [
                    'en' => $request->addressEn,
                    'ar' => $request->addressAr
                ],
                'working_hours' =>  [
                    'en' => $request->workingHoursEn, 
                    'ar' => $request->workingHoursAr
                ],
                'second_phone' =>   $request->secondPhone,
                'phone'        =>   $request->phone,
                'latitude'     =>   $request->lat,
                'longitude'    =>   $request->lng,
                'city_id'      =>   $request->cityId
                
            ]);
            // $nameData =  ['en' => $request->input('nameEn'), 'ar' => $request->input('nameAr')];
            // $addressData =  ['en' => $request->input('addressEn'), 'ar' => $request->input('addressAr')];
            // $workingHours =  ['en' => $request->input('workingHoursEn'), 'ar' => $request->input('workingHoursAr')];
            // $servPoint->name = $nameData;
            // $servPoint->address = $addressData;
            // $servPoint->second_phone=$request->input('secondPhone');
            // $servPoint->phone = $request->input('phone');
            // $servPoint->working_hours = $workingHours;
            // $servPoint->city_id = $request->input('cityId');
            // if ($request->input('active') != null) {
            //     $servPoint->is_active = 1;
            }
            // // return $servPoint;

            // if($servPoint->save())

                return response()->json(
                    [
                        // 'city'=> $city,
                        'status' => 200,
                        'message' => '?????? ?????????????? ??????????',
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
                'message' =>'?????? ?????? ???? ???????? ???? ????????????',
                
                ]
            );
        }
    }

    public function updateServPoint(Request $request, $id)
    {
        // return $id;
        $validator = Validator::make($request->all(), [
            'nameEn' => ['required', 'string', 'between: 3, 255'],
            'nameAr' => ['required', 'string', 'between: 3, 255'],
            'addressAr' => ['required', 'string', 'between: 3, 255'],
            'addressEn' => ['required', 'string', 'between: 3, 255'],
            'phone' => ['required', 'string', 'between: 3, 255'],
            'secondPhone' => ['required', 'string', 'between: 3, 255'],
            'workingHoursAr' => ['required', 'string', 'between: 3, 255'],
            'workingHoursEn' => ['required', 'string', 'between: 3, 255'],
            'lat'=>['required'],
            'lng'=>['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        }
         else {
            $servPoint = service_points::find($id)->update([
                'name'   =>  [
                    'en' => $request->nameEn,
                    'ar' => $request->nameAr
                ],
                'address'=> [
                    'en' => $request->addressEn,
                    'ar' => $request->addressAr
                ],
                'working_hours' =>  [
                    'en' => $request->workingHoursEn, 
                    'ar' => $request->workingHoursAr
                ],
                'second_phone' =>   $request->secondPhone,
                'phone'        =>   $request->phone,
                'latitude'     =>   $request->lat,
                'longitude'    =>   $request->lng,
                'city_id'      =>   $request->cityId
                
            ]);
            // if ($servPoint) {
            // $nameData =  ['en' => $request->input('nameEn'), 'ar' => $request->input('nameAr')];
            // $addressData =  ['en' => $request->input('addressEn'), 'ar' => $request->input('addressAr')];
            // $workingHours =  ['en' => $request->input('workingHoursEn'), 'ar' => $request->input('workingHoursAr')];
            // $servPoint->name = $nameData;
            // $servPoint->address = $addressData;
            // $servPoint->second_phone=$request->input('secondPhone');
            // $servPoint->phone = $request->input('phone');
            // $servPoint->working_hours = $workingHours;
            // $servPoint->city_id = $request->input('cityId');
                // return $city;

                // if ($servPoint->update()) {

                    return response()->json(
                        [
                            'status' => 200,
                            'message' => '???? ?????????? ???????????????? ??????????',

                        ]
                    );
                    // return $city->name;
                }
                //  else {
                //     return response()->json(
                //         [
                //             'status' => 404,
                //             'message' => '?????? ?????? ???? ???????? ???? ????????????',

                //         ]
                //     );
                // }
            // }
        // }
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
                    'message' => '???? ?????????? ???????????????? ??????????',

                ]
            );
            // return $ServPoint->name;
        } else {
            return response()->json(
                [
                    'status' => 404,
                    'message' => '?????? ?????? ???? ???????? ???? ????????????',

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
                    'message' => '???? ?????????? ??????????',

                ]
            );
            // return $ServPoint->name;
        } else {
            return response()->json(
                [
                    'status' => 404,
                    'message' => '?????? ?????? ???? ???????? ???? ????????????',

                ]
            );
        }
    }
}
