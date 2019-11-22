<?php
namespace App\Queries;

use \App\Post;

class PostQueries {
  public function getLatest($count) {
    return Post::selectRaw('title, body, created_at')
      ->where('published', '=', 1)
      ->orderBy('created_at', 'DESC')
      ->limit($count)
      ->get();
  }
}