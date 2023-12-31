<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

use function Termwind\render;
use Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $subCategoryDataTable)
    {
        return $subCategoryDataTable->render('admin.subcategory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => ['required'],
            'name' => ['required', 'max:200', 'unique:sub_categories,name'],
            'status' => ['required'],
        ]);

        $subCatgeories = new SubCategory();
        $subCatgeories->category_id = $request->category;
        $subCatgeories->name = $request->name;
        $subCatgeories->slug = Str::slug($request->name);
        $subCatgeories->status = $request->status;
        $subCatgeories->save();
        toastr('sub Category Created Succesfully', 'success');
        return redirect()->route('admin.sub-category.index');
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
        $subCategories = SubCategory::findOrFail($id);
        return view('admin.subcategory.edit', compact('subCategories', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => ['required'],
            'name' => ['required', 'max:200', 'unique:sub_categories,name,' . $id],
            'status' => ['required'],
        ]);
        $subCategories = SubCategory::findOrFail($id);
        $subCategories->category_id = $request->category;
        $subCategories->name = $request->name;
        $subCategories->slug = Str::slug($request->name);
        $subCategories->status = $request->status;
        $subCategories->save();
        toastr('subCategory Updated Succefully', 'success');
        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $childCategory = ChildCategory::where('sub_category_id', $subCategory->id)->count();
        if ($childCategory > 0) {
            return response(['status' => 'error', 'message' => 'This Item Contain sub Items, you have to delete the sub items first']);
        }
        $subCategory->delete();
        return response(['status' => 'success', 'message' => 'Item Deleted Succefully']);
    }

    public function changeStatus(Request $request)
    {
        $subCategories = SubCategory::findOrFail($request->id);
        $subCategories->status = $request->isChecked == 'true' ? 1 : 0;
        $subCategories->save();
        return response(['status' => 'success', 'message' => 'Status has been updated']);
    }
}
