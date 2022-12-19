<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'course_id'    => $this->id,
            'course_name'  => $this->name,
            'course_slug'  => $this->slug,
            'description'  => $this->description,
            'requirements' => $this->requirements,
            'audience'     => $this->audience,
            'thumbnail'    => $this->thumbnail,
            'status'       => $this->status,
            'category'     => $this->category->name,
            'teacher'      => new UserResource($this->teacher),
        ];
    }
}
