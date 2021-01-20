<?php


namespace App\Services\Impl;


use App\Models\Blog\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryServiceImpl implements CategoryService
{
    public function index()
    {
        return Category::all();
    }

    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function store(Request $request)
    {
        $tag = new Category();

        $tag->name = $request->name;
        $tag->save();

        return Category::all();
    }

    public function update(Request $request, $id)
    {
        $tag = Category::findOrFail($id);

        $tag->name = $request->name;
        $tag->save();

        return $tag;
    }

    public function destroy($id)
    {
        $tag = Category::findOrFail($id);

        $tag->delete();
        return Category::all();
    }
}
