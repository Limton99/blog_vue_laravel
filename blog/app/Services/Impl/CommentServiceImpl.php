<?php


namespace App\Services\Impl;


use App\Models\Blog\Comment;
use App\Models\User;
use App\Services\CommentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentServiceImpl implements CommentService
{

    public function index()
    {
        return Comment::with('user', 'blog')->get();
    }

    public function show($id)
    {
        return Comment::with('user', 'blog')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $user=User::findOrFail(Auth::id());
//        dd($user);

        $comment->author=$user->name;
        $comment->user_id=Auth::id();
        $comment->blog_id=$request->blog_id;
        $comment->comment=$request->comment;

        $comment->save();

        return $comment;

    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $user=User::findOrFail(Auth::id());

        if ($comment->user_id===Auth::id()) {
            $comment->author=$user->username;
            $comment->user_id=Auth::id();
            $comment->blog_id=$request->blog_id;
            $comment->comment=$request->comment;

            $comment->save();

            return $comment;
        }


        return 'Вы можете изменять только свой комментарии';
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        $comment->delete();

        return Comment::all();
    }
}
