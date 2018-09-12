<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meetup extends Model
{
    protected $guarded = [];

    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    public function attendees()
    {
        return $this->belongsToMany(User::class, 'pivot', 'meetup', 'user');
    }
}
