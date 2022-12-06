<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Course;
use App\Models\Picture;
use File;

class GalleryOneController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
    }


    public function create()
    {
        return view('admin.courses.create');
    }


    public function store(Request $request)
    {

    if ($request->hasfile('filename')) {
    $images = $request->file('filename');
    $course_id = $request->input('course_id');


        if(isset($course_id)){
            $id = $course_id;
            $course = new Course;
            $course = Course::find($id);

            if($course){
                $cover_image = end($images);

                if(isset($cover_image)) {


                    $image = public_path('media/courses/cover_images/' . $course->getOriginal('cover_image_gallery'));
                    if($course->cover_image_gallery) {
                        if(file_exists($image)) {
                            unlink($image);
                        }
                    }

                    $image =  $cover_image;
                    $new_name = rand(1,99999) . '.' . $image->getClientOriginalExtension();
                    $image_resize = Image::make($image->getRealPath());
                    $image_resize->resize(null, 246, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_resize->save(public_path('/media/courses/cover_images/'.$new_name));
                    $course->cover_image_gallery = $new_name;


                }
            }
            $course->save();
        }




        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048'
        ]);
            foreach($images as $image) {
                $filename = rand(1,99999) . '.' . 'webp';
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(null, 776, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->encode('webp', 90)->save(public_path('/media/courses/pictures/'.$filename));

                $form= new Picture();
                if(isset($course_id)) {
                    $form->course_id = $course_id;
                }

                $form->filename = $filename;

                $form->save();
            }
        }

        //return view('admin.galleries.index');
        return back()->with('sucesso', 'Upload bem sucedido');
    }


    public function destroy($id)
    {

        $gallery = Picture::find($id);
        $gallery->delete();
        $image = public_path('/media/courses/pictures/' . $gallery->getOriginal('filename'));
        if(file_exists($image)) {
             unlink($image);
        }

        return back()->with('success', 'Images uploaded successfully');

    }



}
