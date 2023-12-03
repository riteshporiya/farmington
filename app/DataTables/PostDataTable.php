<?php

namespace App\DataTables;

use App\Models\Post;

/**
 * Class PostDataTable
 */
class PostDataTable
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function get(): \Illuminate\Database\Eloquent\Builder
    {
        /** @var Post $query */
        return Post::with(['user'])->where('user_id', getLoggedInUserId())->select('posts.*');
    }
}
