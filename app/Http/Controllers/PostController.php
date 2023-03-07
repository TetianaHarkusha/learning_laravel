<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class PostController extends Controller
{
    /**
     * Show the posts
     *
     * @param str $date
     */
    public function showAll($date = null)
    {
        return 'Список постів'. (is_null($date) ? '' : ' від ' . $date) .'.' ;
    }

    /**
     * Show the specified post.
     *
     * @param int $id
     * @param int $postId
     */
    public function show($id, $postId = null)
    {
        return 'Пост ' . (is_null($postId) ? $id : ($postId . ' в категорієї ' . $id));
    }
}
