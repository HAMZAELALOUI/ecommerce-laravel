<?php 

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait ImageUploadTrait{
  public function UploadImage(Request $request ,$inputName,$path){
    if($request->has($inputName)){
    $image=$request->{$inputName};
    $ext=$image->getClientOriginalExtension();
    $imageName='media_'.uniqid().'.'.$ext;
    $image->move(public_path($path),$imageName);
    return $path.'/'.$imageName;
    
    }
  }


    public function UpdateImage(Request $request ,$inputName,$path,$oldPath=null){
      if($request->hasFile($inputName)){
      if(File::exists(public_path($oldPath))){
        File::delete(public_path($oldPath));
    }}
      if($request->has($inputName)){
      $image=$request->{$inputName};
      $ext=$image->getClientOriginalExtension();
      $imageName='media_'.uniqid().'.'.$ext;
      $image->move(public_path($path),$imageName);
      return $path.'/'.$imageName;
      
      }
    }
  
}