<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    function showCategories(){
        return view('admin.categories');
    }

    function fetchCategory(){
        $categories = categories::select()->where('parentId', '0')->get();
        return response()->json([
            'categories' => $categories ,
            'locale'    => app()->getLocale()
        ]);
    }

    function addCategory(Request $request){
        // return $request;
        $validator = Validator::make($request->all(),[
            'name.en'=>['required','string', 'between: 3, 30', 'unique:categories,name'],
            'name.ar'=>['required','string', 'between: 3, 30', 'unique:categories,name'],
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else{
            $category=new categories;
            $data =  ['en' => $request->input('name.en'),'ar' => $request->input('name.ar')];
            $category->name = json_encode($data) ;

            if($request->input('active') != null){
                $category->is_active=1;
            }
            // return $category;

            if($category->save())
            
            return response()->json(
                [
                // 'category'=> $category,
                'status' => 200,
                'message' => 'Data inserted successfully',
                
                ]
            );
            // return $category->name;
        }
    }

    public function editCategory( $id){
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
                'message' =>'Data not Found',
                
                ]
            );
        }

    }

    public function updateCategory(Request $request , $id){
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
            $category= categories::find($id);

            if($category){
                $data =  ['en' => $request->input('nameEn'),'ar' => $request->input('nameAr')];
                $category->name = json_encode($data) ;
    
                if($request->input('active') != null){
                    $category->is_active=1;
                }
                // return $category;
    
                if($category->update()){
                
                    return response()->json(
                        [
                        // 'category'=> $category,
                        'status' => 200,
                        'message' => 'Data Update successfully',
                        
                        ]
                    );
                // return $category->name;
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

    public function deletCategory($id){
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
                'message' => 'Data Update successfully',
                    
                    ]
                );
            // return $category->name;
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
