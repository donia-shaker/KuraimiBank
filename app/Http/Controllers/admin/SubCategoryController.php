<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function showSubCategory($id){
        $subCategory = categories::select()->where('parentId',$id)->get();
        // return $subCategory;
        return view('admin.subCategory')->with([
            'subCategories' => $subCategory ,
            'locale'    => app()->getLocale()
        ]);
    }

    function fetchSubCategory($id){
        $subCategory = categories::select()->where('parentId',$id)->get();
        // $categories = categories::select()->where('parentId', '0')->get();
        return response()->json([
            'categories' => $subCategory ,
            'locale'    => app()->getLocale()
        ]);
    }

    function addSubCategory(Request $request){
        // return $request;
        $validator = Validator::make($request->all(),[
            'nameEn'=>['required','string', 'between: 3, 30', 'unique:categories,name'],
            'nameAr'=>['required','string', 'between: 3, 30', 'unique:categories,name'],
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else{
            $category=new categories;
            $data =  ['en' => $request->input('nameEn'),'ar' => $request->input('nameAr')];
            $category->name = json_encode($data) ;
            $category->parentId = $request->input('parentId') ;

            if($request->input('active') != null){
                $category->is_active=1;
            }
            // return $category;

            if($category->save())
            
            return response()->json(
                [
                // 'category'=> $category,
                'status' => 200,
                'message' => 'تم اضافة البيانات بنجاح',
                
                ]
            );
            else {
                return response()->json(
                    [
                    'status' => 404,
                    'message' =>'فشل في عملية اضافة البيانات',
                    
                    ]
                );
                }
            // return $category->name;
        }
    }

    public function editSubCategory( $id){
        $category = categories::find($id);
        if($category){
            return response()->json(
                [
                // 'category'=> $category,
                'status' => 200,
                'category' => $category,
                
                ]
            );
        }else {
            return response()->json(
                [
                // 'category'=> $category,
                'status' => 404,
                'message' =>'لا يوجد اي بيانات',
                
                ]
            );
        }

    }

    public function updateSubCategory(Request $request , $id){
        //  return $request;
         $validator = Validator::make($request->all(),[
            'nameEn'=>['required','string', 'between: 3, 30', 'unique:categories,name'],
            'nameAr'=>['required','string', 'between: 3, 30', 'unique:categories,name'],
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else{
            $category= categories::find($id);

            if($category){
                $data =  ['en' => $request->input('nameEn'),'ar' => $request->input('nameAr')];
                $category->name = json_encode($data) ;
                $category->parentId = $request->input('parentId') ;
    
                if($request->input('active') != null){
                    $category->is_active=1;
                }
                // return $category;
    
                if($category->update()){
                
                    return response()->json(
                        [
                        // 'category'=> $category,
                        'status' => 200,
                        'message' => 'تم تعديل البيانات بنجاح',
                        
                        ]
                    );
                // return $category->name;
            }else {
                return response()->json(
                    [
                    'status' => 404,
                    'message' =>'لا يوجد بيانات',
                    
                    ]
                );
                }
            }
        }
    }

    public function activeSubCategory($id){
        $category = categories::find($id);

        if($category->is_active )
            $category->is_active=0;
        else 
            $category->is_active=1;
        if($category->save()){
            return response()->json(
                [
                'active'=> $category,
                'status' => 200,
                'message' => 'تم تغيير حالة القسم بنجاح',
                    
                    ]
                );
            // return $category->name;
            }else {
                return response()->json(
                    [
                    'status' => 404,
                    'message' =>'لا يوجد اي بيانات',
                    
                    ]
                );
                }
        }

        public function deleteSubCategory($id){
            $category = categories::find($id);
            if($category->delete()){
                return response()->json(
                [
                'active'=> $category,
                'status' => 200,
                'message' => 'تم حذف البيانات بنجاح',
                    
                    ]
                );
            // return $category->name;
            }else {
                return response()->json(
                    [
                    'status' => 404,
                    'message' =>'لا يوجد اي بيانات',
                    
                    ]
                );
                }
        }
    }
