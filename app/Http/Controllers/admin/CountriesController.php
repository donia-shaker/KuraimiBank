<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\countries;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    function showCountries()
    {
        return view('admin.countries');
    }

    function fetchCountry()
    {
        $countries = countries::select()->get();
        return response()->json([
            'countries' => $countries,
            'locale'    => app()->getLocale()
        ]);
    }

    function addCountry(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'nameEn' => ['required', 'string', 'between: 3, 30', 'unique:countries,name'],
            'nameAr' => ['required', 'string', 'between: 3, 30', 'unique:countries,name'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else {
            $Country = new countries;
            $data =  ['en' => $request->input('nameEn'), 'ar' => $request->input('nameAr')];
            $Country->name = json_encode($data);

            if ($request->input('active') != null) {
                $Country->is_active = 1;
            }
            // return $Country;

            if ($Country->save())

                return response()->json(
                    [
                        // 'Country'=> $Country,
                        'status' => 200,
                        'message' => 'Data inserted successfully',

                    ]
                );
            // return $Country->name;
        }
    }

    public function editCountry($id)
    {
        $Country = countries::find($id);
        if ($Country) {
            return response()->json(
                [
                    // 'Country'=> $Country,
                    'status' => 200,
                    'Country' => $Country,

                ]
            );
        } else {
            return response()->json(
                [
                    // 'Country'=> $Country,
                    'status' => 404,
                    'message' => 'حدث خطا لا يوجد اي بيانات',

                ]
            );
        }
    }

    public function updateCountry(Request $request, $id)
    {
        //  return $request;
        $validator = Validator::make($request->all(), [
            'nameEn' => ['required', 'string', 'between: 3, 30', 'unique:countries,name'],
            'nameAr' => ['required', 'string', 'between: 3, 30', 'unique:countries,name'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else {
            $Country = countries::find($id);

            if ($Country) {
                $data =  ['en' => $request->input('nameEn'), 'ar' => $request->input('nameAr')];
                $Country->name = json_encode($data);

                if ($request->input('active') != null) {
                    $Country->is_active = 1;
                }
                // return $Country;

                if ($Country->update()) {

                    return response()->json(
                        [
                            // 'Country'=> $Country,
                            'status' => 200,
                            'message' => 'تم تعديل البيانات بنجاح',

                        ]
                    );
                    // return $Country->name;
                } else {
                    return response()->json(
                        [
                            'status' => 404,
                            'message' => 'حدث خطا لا يوجد اي بيانات',

                        ]
                    );
                }
            }
        }
    }

    public function activeCountry($id)
    {
        $Country = countries::find($id);

        if ($Country->is_active)
            $Country->is_active = 0;
        else
            $Country->is_active = 1;
        if ($Country->save()) {
            return response()->json(
                [
                    'active' => $Country,
                    'status' => 200,
                    'message' => 'تم تعديل البيانات بنجاح',

                ]
            );
            // return $Country->name;
        } else {
            return response()->json(
                [
                    'status' => 404,
                    'message' => 'حدث خطا لا يوجد اي بيانات',

                ]
            );
        }
    }

    public function deleteCountry($id)
    {
        $Country = countries::find($id);
        if ($Country->delete()) {
            return response()->json(
                [
                    'active' => $Country,
                    'status' => 200,
                    'message' => 'تم الحذف بنجاح',

                ]
            );
            // return $Country->name;
        } else {
            return response()->json(
                [
                    'status' => 404,
                    'message' => 'حدث خطا لا يوجد اي بيانات',

                ]
            );
        }
    }
}
