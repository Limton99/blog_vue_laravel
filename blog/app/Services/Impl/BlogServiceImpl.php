<?php


namespace App\Services\Impl;


use App\Models\Blog\Blog;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogServiceImpl implements BlogService
{

    public function index()
    {
        return Blog::with('tags', 'categories', 'user')->get();
    }

    public function show($id)
    {
        $blog = Blog::with('tags', 'categories', 'user')->findOrFail($id);
        $blog->views+=1;

        return $blog;
    }

    public function store(Request $request)
    {
        if ($files = $request->file('image')) {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);
//            dd($imageName);
            $blog = new Blog();
//            dd(Auth::id());
            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->image = '/images/'.$imageName;
            $blog->user_id = Auth::id();
            $blog->save();
            $blog->tags()->sync($request->get('tag_id'));
            $blog->categories()->sync($request->get('category_id'));

            return Blog::with('tags', 'categories', 'user')->get();
        }

        return 'Пожалуйста добавьте картинку';
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        if ($files = $request->file('image')) {
            $imageName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);

            $blog->title = $request->title;
            $blog->description = $request->description;
            $blog->image = '/images/'.$imageName;
            $blog->save();

            return Blog::with('tags', 'categories', 'user')->get();
        }

        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->save();

        return $blog;
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();

        return Blog::with('tags', 'categories', 'user')->get();
    }

    public function search(Request $request)
    {
        $blogs = Blog::with('tags', 'user', 'categories')
            ->where('title', $request->get('search'))->get();

        return $blogs;
    }
}
