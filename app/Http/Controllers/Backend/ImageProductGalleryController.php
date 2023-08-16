<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ImageProductGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\ImageProductGallery;
use App\Models\Product;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

class ImageProductGalleryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, ImageProductGalleryDataTable $dataTable)
    {
        $product = Product::findOrfail($request->product);
        return $dataTable->render('admin.product.image-gallery.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image.*' => ['required', 'max:2048'],
        ]);
        $imagePaths = $this->UploadMultiImage($request, 'image', 'uploads');

        foreach ($imagePaths as $imagePath) {
            $imageGallery = new ImageProductGallery();
            $imageGallery->image = $imagePath;
            $imageGallery->product_id = $request->product;
            $imageGallery->save();
        }
        toastr('Images created Succefully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
