<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\MeetupResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'meetups' => $this->when($this->meetups->count(),$this->meetups),
            // 'meetups' => new MeetupResource($this->whenLoaded('meetups'))
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
