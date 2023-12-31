<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCategory = Category::all();
        return view('admin.portfolio-category.index', compact('blogCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200']
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->save();

        // toast('success', 'successfully created');
        // Alert::success('Success Title', 'Success Message');

        session()->flash("success", "Category Created Successfully");

        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.portfolio-category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'max:200']
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = \Str::slug($request->name);
        $category->save();

        // toast()->success('Category Updated Successfully!');
        session()->flash("success", "Category Updated Successfully");

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $hasItem = PortfolioItem::where('category_id', $category->id)->count();
        if ($hasItem == 0) {
            $category->delete();
            return true;
        }

        return response(['status' => 'error']);
    }
}
