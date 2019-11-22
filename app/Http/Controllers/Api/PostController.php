<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;

class PostController
{
    public function index(Request $request)
    {
        $sortRules = $request->sort;
        $limit = $request->per_page;

        list($field, $dir) = explode('|', $sortRules);

        $posts = Post::selectRaw('id, title, published, created_at, updated_at')
            ->orderBy($field, $dir);

        if($request->has('filter')) {
            $posts->where('title', 'like', '%'.$request->filter.'%');
        }

        return $posts->paginate($limit);
    }

    public function allPosts() {
        return Post::orderBy('created_at')
            ->where("published", "=", 1)
            ->paginate(4);
    }
}