<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageCat;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.category.category' , [
            'title' => 'Admin | Category',
            'page' => 'List Category' ,
            'listcat' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('dashboard.category.create' , [
            'title' => 'Admin | Category',
            'page' => 'List Category' ,
            'listcat' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin');
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'unique:categories|required'
        ]);
        Category::create($validatedData);
        $category_id = Category::latest()->first();
        ImageCat::where('category_id' , null)->update(['category_id' => $category_id->id]);
        return redirect('/dashboard/category')->with('success' , 'Berhasil Menambahkan category baru');
        //return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $this->authorize('admin');
        return view('dashboard.category.detail' , [
            'page' => 'List Category',
            'title' => 'Admin | Category'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $this->authorize('admin');
        return view('dashboard.category.edit' , [
            'page' => 'List Category',
            'title' => 'Admin | Category' ,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->authorize('admin');
        $rules = [
            'name' => 'required',
        ];

        if($request->name != $category->name){
            $rules['slug'] = 'required|unique:categories';
        }

        $validatedData = $request->validate($rules);

        Category::where('id' , $category->id)->update($validatedData);
        return redirect('/dashboard/category')->with('success' , 'Berhasil Mengubah Category');
        //return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->authorize('admin');
        Category::destroy($category->id);
        return redirect('/dashboard/category')->with('success' , 'Berhasil Menghapus Category');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Category::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
