<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Exceptions\Handler;

use App\Meetup;
use App\Repositories\MeetupRepositoryInterface;
use App\Http\Resources\MeetupResource;
use App\Http\Resources\MeetupCollection;


class MeetupController extends Controller
{
    protected $meetup;

    public function __construct(MeetupRepositoryInterface $meetup)
    {
        $this->meetup = $meetup;
    }

    public function index()
    {
        $meetups = $this->meetup->fetchAll();
        return new MeetupCollection($meetups);
    }

    public function show($id)
    {
        $meetup = $this->meetup->fetch($id);
        if (!$meetup) {
            abort(404, "Meetup with ID $id doesn't exist");
        }
        return new MeetupResource($meetup);
    }

    public function store(Request $request)
    {
        $validator = $this->validateData($request->all());

        if ($validator->fails()) {
            abort(422);
        }

        $meetup = $this->meetup->create($request->all());
        return new MeetupResource($meetup);
    }

    protected function validateData($data)
    {
        $validator = Validator::make($data, [
            'title' => 'required|unique:meetups|max:255',
            'about' => 'required|min:25',
            'where' => 'required|min:15',
            'when' => 'required'
        ]);

        return $validator;
    }
}
