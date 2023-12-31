<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait ImageUploadTrait
{
  public function UploadImage(Request $request, $inputName, $path)
  {
    if ($request->has($inputName)) {
      $image = $request->{$inputName};
      $ext = $image->getClientOriginalExtension();
      $imageName = 'media_' . uniqid() . '.' . $ext;
      $image->move(public_path($path), $imageName);
      return $path . '/' . $imageName;
    }
  }
  public function UploadMultiImage(Request $request, $inputName, $path)
  {

    $imagePaths = [];
    if ($request->has($inputName)) {
      $images = $request->{$inputName};
      foreach ($images as $image) {

        $ext = $image->getClientOriginalExtension();
        $imageName = 'media_' . uniqid() . '.' . $ext;
        $image->move(public_path($path), $imageName);
        $imagePaths[] = '/' . $path . '/' . $imageName;
      }
      return $imagePaths;
    }
  }


  public function UpdateImage(Request $request, $inputName, $path, $oldPath = null)
  {
    if ($request->hasFile($inputName)) {
      if (File::exists(public_path($oldPath))) {
        File::delete(public_path($oldPath));
      }
    }
    if ($request->has($inputName)) {
      $image = $request->{$inputName};
      $ext = $image->getClientOriginalExtension();
      $imageName = 'media_' . uniqid() . '.' . $ext;
      $image->move(public_path($path), $imageName);
      return $path . '/' . $imageName;
    }
  }

  public function deleteImage(string $path)
  {
    if (File::exists(public_path($path))) {
      File::delete(public_path($path));
    }
  }
}
