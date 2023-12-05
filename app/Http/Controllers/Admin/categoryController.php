<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\categoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index', [
            'categories' => Category::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new category();
        return view('admin.categories.categoryForm',[
            'category' => new category()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(categoryFormRequest $request)
    {
        $category = category::create($request->validated())
        ->with('success', 'La catégorie a été ajouté avec succés'); 
        return to_route('admin.category.index');       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.categoryForm',[
            'category' => $category
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(categoryFormRequest $request, Category $category)
    {
        $category->update($request->validated());
        return to_route('admin.category.index')
        ->with('success', 'La catégorie a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('admin.category.index')
        ->with('success', 'La catégorie a bien été supprimé');
    }
}
