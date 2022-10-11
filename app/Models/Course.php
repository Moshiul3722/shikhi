<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    // public function getThumbnailAttribute($name)
    // {
    //     if (str_starts_with($name, 'http')) {
    //         return [
    //             'url'      => $name,
    //         ];
    //     } else {
    //         return [
    //             'url'      => asset('storage/uploads/' . $name),
    //             'fileName' => $name
    //         ];
    //     }
    // }
}
