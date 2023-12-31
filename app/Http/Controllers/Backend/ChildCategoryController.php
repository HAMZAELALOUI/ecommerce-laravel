<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ChildCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ChildCategoryDataTable $childCategoryDataTable)
    {
        return $childCategoryDataTable->render('admin.childcategory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subCategories = SubCategory::all();
        $categories = Category::all();
        return view('admin.childcategory.create', compact('subCategories', 'categories'));
    }
    /**Get Sub Categories data  */
    public function getSubCategory(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->id)->where('status', 1)->get();
        return $subCategories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required'],
            'subcategory' => ['required'],
            'name' => ['required', 'max:200', 'unique:child_categories,name'],
            'status' => ['required'],
        ]);

        $childCategories = new ChildCategory();
        $childCategories->category_id = $request->category;
        $childCategories->sub_category_id = $request->subcategory;
        $childCategories->name = $request->name;
        $childCategories->slug = Str::slug($request->name);
        $childCategories->status = $request->status;
        $childCategories->save();
        toastr('child Category Created Succesfully', 'success');
        return redirect()->route('admin.child-category.index');
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
        $categories = Category::all();
        $childCategories = ChildCategory::findOrFail($id);
        $subCategories = SubCategory::where('category_id', $childCategories->category_id)->get();
        return view('admin.childcategory.edit', compact('subCategories', 'childCategories', 'categories'));
    }
    public function getSubCategoryEdit(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->id)->where('status', 1)->get();
        return $subCategories;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => ['required'],
            'subcategory' => ['required'],
            'name' => ['required', 'max:200', 'unique:child_categories,name,' . $id],
            'status' => ['required'],
        ]);

        $childCategories = ChildCategory::findOrFail($id);
        $childCategories->category_id = $request->category;
        $childCategories->sub_category_id = $request->subcategory;
        $childCategories->name = $request->name;
        $childCategories->slug = Str::slug($request->name);
        $childCategories->status = $request->status;
        $childCategories->save();
        toastr('child Category Updated Succesfully', 'success');
        return redirect()->route('admin.child-category.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $childCategories = ChildCategory::findOrFail($id);
        $childCategories->delete();
        return response(['status' => 'success', 'message' => 'Item Deleted Succefully']);
    }

    public function changeStatus(Request $request)
    {
        $childCategories = ChildCategory::findOrFail($request->id);

        $childCategories->status = $request->isChecked == 'true' ? 1 : 0;
        $childCategories->save();
        return response(['status' => 'success', 'message' => 'Status has been updated']);
    }
}
