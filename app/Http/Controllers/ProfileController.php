<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use File;


class ProfileController extends Controller
{
    public function change_password(Request $request){
        $validator =  Validator::make($request->all(), [
            'old_password'=>'required',
            'password'=>'required|min:6|max:100',
            'confirm_password'=>'required|same:password'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message'=>'Validation Fails',
                'errors'=>$validator->errors()
            ],422);
        }
        $user=$request->user();
        if(Hash::check($request->old_password,$user->password)){
            $user->update([
                'password'=>Hash::make($request->password)
            ]);
            return response()->json([
                'message'=>'Password Updated Successfully',
            ],200);


        }else{
            return response()->json([
                'message'=>'Old Password Not Matched',
            ],400);
        }
    }

    public function update_profile(Request $request){
        $validator =  Validator::make($request->all(), [
            'name'=>'min:2|max:100',
            'profileimage'=>'|mimes:jpg,png'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'message'=>'Validation Fails',
                'errors'=>$validator->errors()
            ],422);
        }

        $user=$request->user();
        
            if($request->hasFile('profileimage')){
                if($user->profileimage){
                $old_path=public_path().'/images/profilephoto'.$user->profileimage;
                if(File::exists($old_path)){
                    File::delete($old_path);
                }
            }
            $image_name='profile-image-'.time().'.'.$request->profileimage->extension();
            $request->profileimage->move(public_path('/images/profilephoto'),$image_name);
        }else{
            $image_name=$user->profileimage;
        }
        $user->update([
            'name'=>$request->name,
            'profileimage'=>$image_name
        ]);

            return response()->json([
                'message'=>'Profile updated successfully'
            ],200);
    }
}