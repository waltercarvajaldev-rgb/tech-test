<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($taskId)
    {
        $comments = Comment::where('task_id', $taskId)->get();
        return response()->json($comments);
    }
}