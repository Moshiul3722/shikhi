<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];



    // public function courseEnroll(){
    //     $this->belongsToMany(Course::class,'courses_users','student_id','course_id');
    // }
    public function courses(){
        $this->belongsToMany(Course::class,'courses_users','student_id','course_id');
    }


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getThumbnailAttribute($name)
    {
        if (str_starts_with($name, 'http')) {
            return [
                'url'      => $name,
            ];
        } else {
            return [
                'url'      => asset('storage/uploads/' . $name),
                'fileName' => $name
            ];
        }
    }
}
