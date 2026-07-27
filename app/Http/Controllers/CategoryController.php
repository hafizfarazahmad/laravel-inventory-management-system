<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $data['categories'] = Category::all();
        return view('categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $category = new Category();
        $category->name        = $data['name'];
        $category->description = $data['description'];
        $category->status      = $data['status'];
        $category->save();
        return redirect()->route('category.index')->with('success', 'Category Added Successfully');
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
        $data['category'] = Category::findorfail($id);
        return view('categories.edit', $data);
    }   

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->validated();
        $category = Category::findorfail($id);
        $category->name        = $data['name'];
        $category->description = $data['description'];
        $category->status      = $data['status'];
        $category->save();
        return redirect()->route('category.index')->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    try {

        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')
            ->with('success', 'Category Deleted Successfully');

    } catch (QueryException $e) {

        return redirect()->back()
            ->with('error', 'This record cannot be deleted because it is being used.');

    } catch (\Exception $e) {

        return redirect()->back()
            ->with('error', 'Something went wrong.');
    }
}
}