<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

class MeetupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'title' => $this->title,
            'description' => $this->about,
            'where' => $this->where,
            'when' => $this->when,
            'attendees' => $this->when($this->attendees->count(), new UserCollection($this->attendees))
            // 'attendees' => UserResource::collection($this->whenLoaded('attendees'))
        ];
    }

    public function with($request)
    {
        return [
            'about' => [
                'description' => 'Meetup API',
                'version' => '0.1a',
                'by' => url('https://www.github.com/scyhhe')
                ]
        ];
    }
}
