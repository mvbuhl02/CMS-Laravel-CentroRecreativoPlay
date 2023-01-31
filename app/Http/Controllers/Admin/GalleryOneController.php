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

    public function create()
    {
        return view('admin.courses.create');
    }

    public function loadPictures(Request $request){
        $id =  $request->id;
        $page = $request->page;

            $max = 2;
            $ofs = ($page * $max) - $max;

            $pictures = DB::table('pictures')
            ->where('course_id', $id)
            ->offset($ofs)
            ->limit($max)
            ->orderBy('id', 'DESC')
            ->get();

            return $pictures;
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
                $width = Image::make($image->getRealPath())->width();
                $height = Image::make($image->getRealPath())->height();
                $image_resize = Image::make($image->getRealPath());
                $filename = rand(1,99999) . '.' . 'webp';
                $image_resize->resize(null, 576, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->encode('webp', 90)->save(public_path('/media/courses/pictures/'.$filename));
                $pictures = new Picture();
                if(isset($course_id)) {
                    $pictures->course_id = $course_id;
                }
                $pictures->width = $width;
                $pictures->height = $height;
                $pictures->filename = $filename;

                $pictures->save();
            }
        }
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
