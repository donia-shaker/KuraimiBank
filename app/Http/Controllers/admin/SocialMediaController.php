<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\social_media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SocialMediaController extends Controller
{
    function showSocialMedia(){
        return view('admin.socialMedia');
    }

    function fetchSocialMedia(){
        $socialMedia = social_media::select()->get();
        return response()->json([
            'socialMedia' => $socialMedia ,
            'locale'    => app()->getLocale()
        ]);
    }

    function addSocialMedia(Request $request){
        // return $request;
        $validator = Validator::make($request->all(),[
            'nameEn'=>['required','string', 'between: 3, 255'],
            'nameAr'=>['required','string', 'between: 3, 255'],
            'link'=>['required','string', 'min: 3', 'unique:social_media,link'],
            'icon'=>['required','string', 'between: 3, 30'],
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else{
            $socialMedia=new social_media;
            $data =  ['en' => $request->input('nameEn'),'ar' => $request->input('nameAr')];
            $socialMedia->name = json_encode($data) ;
            $socialMedia->link = $request->input('link') ;
            $socialMedia->icon = $request->input('icon') ;
            // $socialMedia = social_media::create([
            //     'name'=> ['en' => $request->nameEn,'ar' => $request->nameAr],
            //     'link'=>$request->link,
            //     'icon'=>$request->icon,
            // ]);

            // if($request->input('active') != null){
            //     $socialMedia->is_active=1;
            // }
            // return $socialMedia;

            if($socialMedia->save())
            
            return response()->json(
                [
                // 'socialMedia'=> $socialMedia,
                'status' => 200,
                'message' => 'Data inserted successfully',
                
                ]
            );
            // return $socialMedia->name;
        }
    }

    public function editSocialMedia( $id){
        $socialMedia = social_media::find($id);
        if($socialMedia){
            return response()->json(
                [
                // 'socialMedia'=> $socialMedia,
                'status' => 200,
                'socialMedia' => $socialMedia,
                
                ]
            );
        }else {
            return response()->json(
                [
                // 'socialMedia'=> $socialMedia,
                'status' => 404,
                'message' =>'Data not Found',
                
                ]
            );
        }

    }

    public function updateSocialMedia(Request $request , $id){
        //  return $request;
         $validator = Validator::make($request->all(),[
            'nameEn'=>['required','string', 'between: 3, 255'],
            'nameAr'=>['required','string', 'between: 3, 255'],
            'link'=>['required','string', 'min: 3', 'unique:social_media,link'],
            'icon'=>['required','string', 'between: 3, 30'],
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 400,
                'errors' => $validator->getMessageBag(),
            ]);
        } else{
            $socialMedia= social_media::find($id);

            if($socialMedia){
                $data =  ['en' => $request->input('nameEn'),'ar' => $request->input('nameAr')];
                $socialMedia->name = json_encode($data) ;
                $socialMedia->link = $request->input('link') ;
                $socialMedia->icon = $request->input('icon') ;
                if($request->input('active') != null){
                    $socialMedia->is_active=1;
                }
                // return $socialMedia;
    
                if($socialMedia->update()){
                
                    return response()->json(
                        [
                        // 'socialMedia'=> $socialMedia,
                        'status' => 200,
                        'message' => 'Data Update successfully',
                        
                        ]
                    );
                // return $socialMedia->name;
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

    public function activeSocialMedia($id){
        $socialMedia = social_media::find($id);

        if($socialMedia->is_active )
            $socialMedia->is_active=0;
        else 
            $socialMedia->is_active=1;
        if($socialMedia->save()){
            return response()->json(
                [
                'active'=> $socialMedia,
                'status' => 200,
                'message' => 'Data Update successfully',
                    
                    ]
                );
            // return $socialMedia->name;
            }else {
                return response()->json(
                    [
                    'status' => 404,
                    'message' =>'Data not Found',
                    
                    ]
                );
                }
        }

        public function deleteSocialMedia($id){
            $socialMedia = social_media::find($id);
            if($socialMedia->delete()){
                return response()->json(
                [
                'active'=> $socialMedia,
                'status' => 200,
                'message' => 'Data Delete successfully',
                    
                    ]
                );
            // return $socialMedia->name;
            }else {
                return response()->json(
                    [
                    'status' => 404,
                    'message' =>'Data not Found',
                    
                    ]
                );
                }
        }}
