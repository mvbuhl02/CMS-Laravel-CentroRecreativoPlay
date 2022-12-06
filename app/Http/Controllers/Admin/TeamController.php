<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\Models\Team;

class TeamController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::all();

        return view('admin.team.index', [
            'team' => $team
        ]);

    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('admin.team.create');
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {

        $data = $request -> only([
            'name'
        ]);

        $team = new Team;
        $team->name = $data['name'];

        if ($request->file('picture')) {
            $image = $request->file('picture');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(null, 276, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $image_resize->save(public_path('/media/team/'.$new_name));
            $team->picture = $new_name;
        }
        $team->save();


        return back()->with('sucesso', 'Upload bem sucedido');
    }


    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $team = Team::find($id);

        if($team){
            return view('admin.team.edit', [
                'team' => $team
            ]);
        }
        return redirect()->route('equipe.index');
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {

        $team = Team::find($id);

        if($team){

            $name = $request['name'];
            $picture = $request['picture'];
            $team->name = $request->name;

            if(isset($picture)) {

                $image = public_path('media/team/' . $team->getOriginal('picture'));
                if(file_exists($image)) {
                    unlink($image);
                }
                $image =  $request['picture'];
                $new_name = rand(1,99999) . '.' . $image->getClientOriginalExtension();
                $image_resize = Image::make($image->getRealPath());
                $image_resize->resize(null, 276, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->save(public_path('/media/team/'.$new_name));
                $team->picture = $new_name;


            }


            $team->save();
           }

        return redirect()->route('equipe.index');
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {

        $team = Team::find($id);
        $team->delete();
        $image = public_path('media/team/' . $team->getOriginal('picture'));
        if(file_exists($image)) {
            unlink($image);
        }

        return back();

    }

}
