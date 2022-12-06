<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Picture;
use Illuminate\Support\Facades\DB;


class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';



    public function pictures()
    {

        return  $this->hasMany('App\Models\Picture');

        //$topic->posts()->paginate(10)->render()
        //return $this->hasMany('App\Models\Picture', 'course_id');

        /*
        ->join('courses', 'pictures.course_id', '=', 'courses.id')
        ->select('course_id', 'pictures.filename')
        ->paginate(1);
        */

    }
}
