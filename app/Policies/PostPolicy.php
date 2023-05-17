<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\UserLogin;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\UserLogin  $userLogin
     * @param  string  $ability
     * @return void|bool
     */
    public function before(UserLogin $userLogin, $ability)
    {
        if ($userLogin->isAdmin()) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\UserLogin  $userLogin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(UserLogin $userLogin)
    {
        return !($userLogin->isUser())
            ? Response::allow()
            : Response::deny( __('Sorry, You do not have access to view posts.'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\UserLogin  $userLogin
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(UserLogin $userLogin, Post $post)
    {
        return ($userLogin->user_id === $post->user_id)
            ? Response::allow()
            : Response::deny( __('Sorry, You do not have access to view this post.'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\UserLogin  $userLogin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(UserLogin $userLogin)
    {
        return !$userLogin->isUser()
            ? Response::allow()
            : Response::deny( __('Sorry, You do not have access to create posts.'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\UserLogin  $userLogin
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(UserLogin $userLogin, Post $post)
    {
        return $userLogin->user_id === $post->user_id
            ? Response::allow()
            : Response::deny( __('Sorry, You do not have access to update this post.'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\UserLogin  $userLogin
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(UserLogin $userLogin, Post $post)
    {
        return $userLogin->user_id === $post->user_id
            ? Response::allow()
            : Response::deny( __('Sorry, You do not have access to delete this post.'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\UserLogin  $userLogin
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(UserLogin $userLogin, Post $post)
    {
        return $userLogin->user_id === $post->user_id
            ? Response::allow()
            : Response::deny( __('Sorry, You do not have access to restore posts.'));
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\UserLogin  $userLogin
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(UserLogin $userLogin, Post $post)
    {
        return $userLogin->user_id === $post->user_id
            ? Response::allow()
            : Response::deny( __('Sorry, You do not have access to delete posts.'));
    }
}
