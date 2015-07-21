<?php 

namespace App\Repositories;

interface UserRepositoryInterface {

    public function findById($id);

    public function findByLogin($login);
}