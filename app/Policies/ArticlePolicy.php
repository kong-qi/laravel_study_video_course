<?php

namespace App\Policies;

use App\Models\Article;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any articles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
        return 1;
    }

    /**
     * Determine whether the user can view the article.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function view(User $user, Article $article)
    {
        //
    }

    /**
     * Determine whether the user can create articles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the article.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function update(User $user, Article $article)
    {

        $r= $user->id == $article->user_id;
        return $r? Response::allow()
                : Response::deny('不是您的文章哦');
    }

    /**
     * Determine whether the user can delete the article.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function delete(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }

    /**
     * Determine whether the user can restore the article.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function restore(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }

    /**
     * Determine whether the user can permanently delete the article.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Article  $article
     * @return mixed
     */
    public function forceDelete(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }
}
