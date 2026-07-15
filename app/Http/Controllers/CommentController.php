<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'nullable|email',
            'comment' => 'required|max:1000',
        ]);

        $article->comments()->create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim.');
    }
}