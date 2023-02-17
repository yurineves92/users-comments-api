<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function getAllComments()
    {
        $comments = Comment::where('user_id', '=', Auth::user()->id)->get();

        return response()->json(
            [
                "data" => [
                    "comments" => $comments,
                ],
            ],
            200
        );
    }

    public function createComment(Request $request)
    {
        $this->validate($request, [
            'message' => 'required',
            'user_id' => 'required',
        ]);
        
        $comment = Comment::create($request->all());

        return response()->json(
            [
                "data" => [
                    "message" => 'Comment created successfully.',
                    'comment' => $comment
                ]
            ],
            201
        );
    }

    public function updateComment(Request $request, $id)
    {
        $comment = Comment::where('user_id', '=', Auth::user()->id)->where('id', '=', $id)->first();
        if(empty($comment)) {
            return response()->json(
                [
                    "data" => [
                        "message" => "Comment not found for update.",
                    ],
                ],
                200
            );
        }

        $comment->message = $request->message;
        $comment->user_id = Auth::user()->id;
        $comment->update();

        return response()->json(
            [
                "data" => [
                    "message" => 'Comment updated successfully.',
                    'comment' => $comment
                ]
            ],
            201
        );
    }

    public function deleteComment($id)
    {
        Comment::findOrFail($id)->delete();
        
        return response()->json(
            [
                "data" => [
                    "message" => 'Comment removed successfully.'
                ]
            ],
            200
        );
    }
}
