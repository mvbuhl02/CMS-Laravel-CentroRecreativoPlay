<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\Models\Us;

class UsController extends Controller
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
        $us = Us::paginate(50);
        return view('admin.us.index', [
            'us' => $us,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('admin.us.create');
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        /*
        <--------UPLOAD NOS-------->
        */
        $data = $request -> only([
            'text'
        ]);

        $us = new Us;
        $us->text = $data['text'];

        if ($request->file('picture')) {
            $image = $request->file('picture');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(null, 476, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $image_resize->save(public_path('/media/us/'.$new_name));
            $us->picture = $new_name;
        }
        $us->save();

        return back()->with('sucesso', 'Upload bem sucedido');
    }

    public function edit($id)
    {
        $us = Us::find($id);

        if($us){
            return view('admin.us.edit', [
                'us' => $us,
            ]);
        }
        return redirect()->route('nos.index');
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {

        $us = Us::find($id);

        if($us){

            $text = $request['text'];
            $picture = $request['picture'];
            $us->text = nl2br($text);
            if(isset($picture)) {

                $image = public_path('media/us/' . $us->getOriginal('picture'));
                if($us->picture) {
                    if(file_exists($image)) {
                        unlink($image);
                    }
                }
                $image =  $request['picture'];
                $new_name = rand(1,99999) . '.' . $image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(null, 746, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->save(public_path('/media/us/'.$new_name));
                $us->picture = $new_name;
            }
            $us->save();
           }

        return redirect()->route('nos.index');
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $us = Us::find($id);
        $us->delete();
        $image = public_path('media/us/' . $us->getOriginal('picture'));
        if(file_exists($image)) {
            unlink($image);
        }
        return back();
    }
}
