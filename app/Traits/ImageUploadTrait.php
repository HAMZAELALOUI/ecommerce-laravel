<?php 

namespace App\Traits;

use Illuminate\Http\Request;

trait ImageUploadTrait
{
  public function UploadImage(Request $request ,$inputName,$path){
    if($request->has($inputName)){
    $image=$request->{$inputName};
    $ext=$image->getClientOriginalExtension();
    $imageName='media_'.uniqid().'.'.$ext;
    $image->move(public_path($path),$imageName);
    return $path.'/'.$imageName;
    
    }
  }
}