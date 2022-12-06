<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\Models\About;
class AboutController extends Controller
{
    public function index(){
        $about = About::all();

        return view('admin.about.index',[
            'about' => $about
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('admin.about.create');
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {

        $data = $request -> only([
            'phone',
            'whatsapp',
            'instagram',
            'facebook',
            'email',
            'address',
            'text',
            'title',
            'logo',
            'favicon',
            'keywords',
            'picture'
        ]);

        $about = new About;
        $about->phone = $data['phone'];
        $about->whatsapp = $data['whatsapp'];
        $about->instagram = $data['instagram'];
        $about->facebook = $data['facebook'];
        $about->email = $data['email'];
        $about->address = $data['address'];
        $about->text = $data['text'];
        $about->title = $data['title'];
        $about->keywords = $data['keywords'];



        if(isset($data['logo'])) {

            $image = public_path('media/about/' . $about->getOriginal('logo'));
            if($about->logo) {
                if(file_exists($image)) {
                    unlink($image);
                }
            }
            $image =  $request['logo'];
            $new_name = 'logo.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(250, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('/media/about/'.$new_name));
            $about->logo = $new_name;
        }

        if(isset($data['picture'])) {

            $image = public_path('media/about/' . $about->getOriginal('picture'));
            if($about->picture) {
                if(file_exists($image)) {
                    unlink($image);
                }
            }
            $image =  $request['picture'];
            $new_name = 'picture.' . 'webp';
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(null, 676, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->encode('webp', 90)->save(public_path('/media/about/'.$new_name));
            $about->picture = $new_name;
        }

        if(isset($data['favicon'])) {

            $image = public_path('media/about/' . $about->getOriginal('favicon'));

            if($about->favicon) {
                if(file_exists($image)) {
                    unlink($image);
                }
            }
            $image =  $request['favicon'];
            $new_name = 'favicon.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(64, 64, function ($constraint) {
                $constraint->aspectRatio();

            });
            $image_resize->save(public_path('/media/about/'.$new_name));
            $about->favicon = $new_name;
        }

        $about->save();
        return  $this->index();

    }


    public function edit($id)
    {
        $about = About::find($id);

        if($about){
            return view('admin.about.edit', [
                'about' => $about
            ]);
        }
        return  $this->index();

    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {

        $about = About::find($id);

        if($about){
            $data = $request -> only([
                'phone',
                'whatsapp',
                'instagram',
                'facebook',
                'email',
                'address',
                'text',
                'title',
                'logo',
                'favicon',
                'picture',
                'keywords'
            ]);

            $about->phone = $data['phone'];
            $about->whatsapp = $data['whatsapp'];
            $about->instagram = $data['instagram'];
            $about->facebook = $data['facebook'];
            $about->email = $data['email'];
            $about->address = $data['address'];
            $about->text = $data['text'];
            $about->title = $data['title'];
            $about->keywords = $data['keywords'];


            if(isset($data['logo'])) {

                $image = public_path('media/about/' . $about->getOriginal('logo'));
                if($about->logo) {
                    if(file_exists($image)) {
                        unlink($image);
                    }
                }
                $image =  $request['logo'];
                $new_name = 'logo.' . $image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(250, 150, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->save(public_path('/media/about/'.$new_name));
                $about->logo = $new_name;
            }

            if(isset($data['picture'])) {

                $image = public_path('media/about/' . $about->getOriginal('picture'));
                if($about->picture) {
                    if(file_exists($image)) {
                        unlink($image);
                    }
                }
                $image =  $request['picture'];
                $new_name = 'picture.' . $image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(null, 570, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->save(public_path('/media/about/'.$new_name));
                $about->picture = $new_name;
            }

            if(isset($data['favicon'])) {

                $image = public_path('media/about/' . $about->getOriginal('favicon'));
                if($about->favicon) {
                    if(file_exists($image)) {
                        unlink($image);
                    }
                }
                $image =  $request['favicon'];
                $new_name = 'favicon.' . $image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(64, 64, function ($constraint) {
                    $constraint->aspectRatio();

                });
                $image_resize->save(public_path('/media/about/'.$new_name));
                $about->favicon = $new_name;
            }

            $about->save();
           }
           return  $this->index();

    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $about = About::find($id);
        $about->delete();
        $image = public_path('media/about/' . $about->getOriginal('logo'));
        if(file_exists($image)) {
            unlink($image);
        }

        $image_fav = public_path('media/about/' . $about->getOriginal('favicon'));
        if(file_exists($image_fav)) {
            unlink($image_fav);
        }

        $picture = public_path('media/about/' . $about->getOriginal('picture'));
        if(file_exists($picture)) {
            unlink($picture);
        }
        return  $this->index();
    }
}
