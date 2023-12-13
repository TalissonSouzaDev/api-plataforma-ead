<?php

namespace App\Repositories\Traits;

use App\Models\User;

trait RepositoryTrait
 {
    public function getUserAuth() : user
     {

        return auth()->user();

     }

}