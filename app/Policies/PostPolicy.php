<?php

namespace App\Policies;

use App\Permission;
use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function view_post(User $user,Post $post){
       return $user->id == $post->id_author;
    }

    public function save_post(User $user,Post $post){
        return $user->id == $post->id_author;
    }



    public function before($user, $ability=null)
    {
        if ($user->email == "contato@liniker.com.br") {
            return true;
        }
    }

}
