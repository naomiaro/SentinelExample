<?php 

namespace App\Repositories\Eloquent;

use App\Repositories\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface {

    public function findById($id) {
        return User::find($id);
    }

    public function findByLogin($login) {
        return User::where('email', $login)->first();
    }
}