<?php


namespace App\Services\Impl;


use App\Models\Blog\Tag;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagServiceImpl implements TagService
{

    public function getAll()
    {
        $tags = Tag::all();
//        dd(Tag::with('blogs')->get());
        if (!$tags) {
            throw new \Exception('Ничего не найдено!!');
        }

        return $tags;


    }

    public function show($id)
    {
        return Tag::findOrFail($id);
    }

    public function store(Request $request)
    {
        $tag = new Tag();

        $tag->name = $request->name;
        $tag->save();

        return Tag::all();
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $tag->name = $request->name;
        $tag->save();

        return $tag;
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);

        $tag->delete();
        return Tag::all();
    }
}
