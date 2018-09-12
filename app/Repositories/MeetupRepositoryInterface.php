<?php

namespace App\Repositories;

interface MeetupRepositoryInterface {
    public function fetchAll();
    public function fetch($id);
    public function create($data);
}
