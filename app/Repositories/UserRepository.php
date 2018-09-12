<?php

namespace App\Repositories;

use App\User;

class UserRepository {

    public function getAll($paginate = 10)
    {
        // return User::with('meetups')->paginate($paginate);
        return User::paginate($paginate);
    }

    public function fetch($id)
    {
        return User::find($id);
    }
}
