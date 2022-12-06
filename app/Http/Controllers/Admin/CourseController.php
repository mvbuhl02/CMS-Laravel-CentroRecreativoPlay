<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\Models\Picture;
use App\Models\Course;


class CourseController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /*
    |--------------------------------------------------------------------------
    | PAGE RETURN
    |--------------------------------------------------------------------------
    */

    public function index()
    {

        $courses = Course::paginate(50);
        $pictures = Picture::paginate(50);

        $loggedId = Auth::id();

        return view('admin.courses.index', [
            'courses' => $courses,
            'pictures' => $pictures
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('admin.courses.create');
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        /*
        <--------UPLOAD COURSE-------->
        */
        $data = $request -> only([
            'title',
            'description'
        ]);

        $course = new Course;
        $course->title = $data['title'];
        $course->description = $data['description'];

        if ($request->file('cover_image')) {
            $image = $request->file('cover_image');
            $new_name = rand(1,99999) . '.' . 'webp';
            $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(null, 676, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $image_resize->encode('webp', 90)->save(public_path('/media/courses/cover_images/'.$new_name));
            $course->cover_image = $new_name;
        }
        $course->save();

        /*
            <--------UPLOAD PICTURE/GALLERY-------->
        */
        if ($request->hasfile('filename')) {
        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048'
        ]);

            $images = $request->file('filename');

        foreach($images as $image) {
                $filename = rand(1,99999) . '.' . 'webp';
                $image_resize = Image::make($image->getRealPath());
                $image_resize
                ->resize(null, 776, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->encode('webp', 90)->save(public_path('/media/courses/pictures/'.$filename));
                $upload_pictures= new Picture();
                $upload_pictures->course_id = $course->id;
                $upload_pictures->filename = $filename;
                $upload_pictures->save();
                }
            }

        return back()->with('sucesso', 'Upload bem sucedido');
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $course = Course::find($id);
        $pictures = Picture::paginate(50);

        if($course){
            return view('admin.courses.edit', [
                'course' => $course,
                'pictures' => $pictures

            ]);
        }
        return redirect()->route('cursos.index');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {

        $course = Course::find($id);

        if($course){

            $title = $request['title'];
            $description = $request['description'];
            $cover_image = $request['cover_image'];

            $course->title = $request->title;
            $course->description = nl2br($description);


            if(isset($cover_image)) {

                $image = public_path('media/courses/cover_images/' . $course->getOriginal('cover_image'));
                if(file_exists($image)) {
                    unlink($image);
                }
                $image =  $request['cover_image'];
                $new_name = rand(1,99999) . '.' . 'webp';
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(null, 346, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->encode('webp', 90)->save(public_path('/media/courses/cover_images/'.$new_name));
                $course->cover_image = $new_name;


            }


            $course->save();
           }

        return redirect()->route('cursos.index');
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {

    $pictures = Picture::all()->where('course_id', "=", $id);
        foreach($pictures as $picture){
            $picture->delete();
            $file = public_path('media/courses/pictures/' . $picture->getOriginal('filename'));
            if(file_exists($file)) {
                unlink($file);
            }
        }

        $course = Course::find($id);
        $course->delete();
        $image = public_path('media/courses/cover_images/' . $course->getOriginal('cover_image'));
        if(file_exists($image)) {
            unlink($image);
        }

        return back();

    }

}
