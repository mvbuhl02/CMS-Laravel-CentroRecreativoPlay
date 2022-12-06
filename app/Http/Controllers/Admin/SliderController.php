<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Models\Slider;
use File;

class SliderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $slider= Slider::paginate(100);
        return view('admin.slider.index', [
            'slider' => $slider
        ]);
    }


    public function create()
    {
        return view('admin.slider.create');
    }


    public function main(Request $request, $id)
    {
        $slider = Slider::find($id);
        $main = $request['main'];
        $slider->main = $main;
        return back();

    }

    public function store(Request $request)
    {
        $text = $request['text'];


        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,webp,svg'
        ]);

        if ($request->hasfile('filename')) {
            $images = $request->file('filename');


            foreach($images as $image) {

                $extension = $image->getClientOriginalExtension();

                if($extension == 'gif'){
                    $image_resize = $image->getRealPath();
                    $filename = rand(1,99999) . '.' . $extension;
                    $image_resize->save(public_path('/media/slider/'.$filename));
                }else{
                    $image_resize = Image::make($image->getRealPath());
                    $filename = rand(1,99999) . '.' . 'webp';
                    $image_resize->encode('webp', 90);
                    $image_resize->resize(null, 766, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->save(public_path('/media/slider/'.$filename));

                }






                $main = $request->input('main');

                if(is_null($main)) {
                    $main = 0;
                }

                $form= new Slider();
                $form->slide = $filename;
                $form->text = nl2br($text);
                $form->main = $main;


                $form->save();
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
        $slide = Slider::find($id);

        if($slide){
            return view('admin.slider.edit', [
                'slide' => $slide
            ]);
        }
        return redirect()->route('slider.index');
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {

        $slider = Slider::find($id);

        if($slider){

            $text = $request['text'];
            $slide = $request['slide'];
            $main = $request['main'];

            if($main == 1){
                DB::table('slider')
                ->where('main', 1)  // find your user by their email
                ->update(array('main' => 0));  // update the record in the DB.
            }
            $slider->text = $request->text;

            $slider->main=$main;

            if(isset($slide)) {

                $image = public_path('media/slider/slides/' . $slider->getOriginal('slide'));
                if(file_exists($image)) {
                    unlink($image);
                }
                $image =  $request['slide'];
                $new_name = rand(1,99999) . '.' . 'webp';
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(null, 746, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->save(public_path('/media/slider/slides/'.$new_name));
                $slider->slide = $new_name;
            }


            $slider->save();
           }

        return redirect()->route('slider.index');
    }


    public function destroy($id)
    {

        $slider = Slider::find($id);
        $slider->delete();
        $image = public_path('media/slider/' . $slider->getOriginal('slide'));
        if(file_exists($image)) {
             unlink($image);
        }

        return back();

    }



}
