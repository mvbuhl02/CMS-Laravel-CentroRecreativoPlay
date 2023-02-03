<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Models\Picture;
use App\Models\Course;

class GalleriesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::paginate(50);
        $pictures = Picture::paginate(1);

        return view('admin.galleries.index', [
            'pictures' => $pictures,
            'courses' => $courses,
        ]);
    }



    public function load()
    {
        return 'hello';
        /*
        $id =  $request->id;
        $page = $request->page;
        $max = 4;
        $ofs = ($page * $max) - $max;

        $pictures = DB::table('pictures')
        ->where('course_id', $id)
        ->offset($ofs)
        ->limit($max)
        ->select('filename', 'id')
        ->orderBy('id', 'DESC')
        ->get();

        $pictures_json = $pictures->map(function($pic) {

        $data = [
            'src' => 'media/courses/pictures/'.$pic->filename,
            'width' => $pic->id
        ];
        return $data;
    });

    return json_encode($pictures_json);
*/
    }
}
