<?php

namespace App\Repositories;

use App\Meetup;
use App\Repositories\MeetupRepositoryInterface;

class MeetupRepository implements MeetupRepositoryInterface {

    public function fetchAll($paginate = 5)
    {
        return Meetup::paginate($paginate);
    }
    public function fetch($id)
    {
        return Meetup::find($id);
    }
    public function create($data)
    {
        return Meetup::create($data);
    }
}
