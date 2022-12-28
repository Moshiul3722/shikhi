<?php

namespace App\Http\Resources;

use App\Models\User;
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
            'course_id'      => $this->id,
            'course_name'    => $this->name,
            'course_slug'    => $this->slug,
            'description'    => $this->description,
            'requirements'   => $this->requirements,
            'audience'       => $this->audience,
            'thumbnail'      => getAssetUrl($this->thumbnail, 'storage/uploads'),
            'status'         => $this->status,
            'category'       => $this->category->name,
            'teacher'        => new UserResource($this->teacher),
            'course_lessons' => collect($this->lessons)->map(function($lesson){
                return new LessonResource($lesson);
            }),
            'course_review'  => collect($this->reviews)->map(function ($review) {
                return new ReviewResource($review);
            }),
            'course_student'=>collect($this->students)->map(function($student){
                return new UserResource($student);
            })
        ];
    }
}
