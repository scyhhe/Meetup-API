<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

class UserController extends Controller
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        return new UserCollection($this->users->getAll());
    }

    public function show($id)
    {
        $user = $this->users->fetch($id);
        if (! $user) {
            abort(404, "User with ID $id doesn't exist");
        }

        return new UserResource($user);
    }

    public function attend(Request $request, $user, $id)
    {
        $user = $this->users->fetch($user);
        /** Check if user is already attending the specified meetup
        *   And return the proper response. Keep in mind that syncWithoutDetaching will not
        *   modify anything if the id already exists in DB, this is just to let the consumer know
        *   that the user is already attending the meetup. If you want to just return the user,
        *   without checking ( which is an extra query..), just comment out the if statement :)
        **/
        if ($user->meetups()->where('meetup', $id)->exists()) {
            abort(409);
        }
        $user->meetups()->syncWithoutDetaching([$id]);

        return new UserResource($user);
    }

    public function unattend(Request $request,$user, $id)
    {
        $user = $this->users->fetch($user);
        if (!$user->meetups()->where('meetup', $id)->exists()) {
            abort(404, "The user with an ID of $user->id either does not exist or is not attending meetup #$id ");
        }
        $user->meetups()->detach($id);

        return new UserResource($user);
    }
}
