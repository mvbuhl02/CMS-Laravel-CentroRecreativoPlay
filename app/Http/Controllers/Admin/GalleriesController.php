<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

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
        $pictures = Picture::paginate(50);

        return view('admin.galleries.index', [
            'pictures' => $pictures,
            'courses' => $courses,
        ]);
    }
}
