<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommentAdminController extends AdminController
{
    public function index()
    {
        return view('admin_panel.comments.comments', ['comments' => Comment::all()]);
    }

    /**
     * форма удаления коментария
     */
    public function showDeleteCommentForm(Comment $comment)
    {
        return view('admin_panel.comments.comment_delete', compact('comment'));
    }

    /**
     * удаление коментария
     */
    public function destroyComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments');
    }
}
