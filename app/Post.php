<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body'];

    public function postCounter() {
        return $this->count();
    }

    public function togglePublished() {
        $this->published = !$this->published;

        return $this;
    }
}
