<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

use App\Models\Picture;
use App\Models\Course;


class GalleryController extends Controller
{
    public function index(){
        $slider= Slider::all();
        $courses = Course::all();


    }

    public function loadPictures(Request $request){
$id =  $request->id;
$page = $request->page;
/*

        $id = 1;
        //$id = 'dfuytfuyf';



    $page = request('page');
    $max = 1;

    $ofs = ($page * $max) - $max;

*/
    //$id = 1;




    //$pictures = Picture::all();



    $max = 2;
    $ofs = ($page * $max) - $max;

    $pictures = DB::table('pictures')
    ->where('course_id', $id)
    ->offset($ofs)
    ->limit($max)
    ->orderBy('id', 'DESC')
    ->get();



        return $pictures;

    //return view('site.page', ['pictures' => $pictures]) ;

    //var_dump($pictures);
/*
    $data = '';
    if ($request->ajax()) {
        foreach ($users as $user) {
            $data.='<li>'.'Name:'.' <strong>'.$user->name.'</strong><br> Email: '.$user- >email.'</li>';
        }
        return $data;
    }

    return view('user',compact('users'));
*/
    //return 1234;
        //
        /*
        $data = $request->only([
            'page',
            'id'
        ]);
        $validator = Validator::make([
            'page' => $data['page'],
            'id' => $data['id']
        ],[
            'page' => ['required', 'integer', 'max:255'],
            'id' => ['required', 'integer', 'max:255']
        ]);
        if(count($validator->errors()) > 0){
            return redirect()->route('/')->withErrors($validator);
        }

        $page = $data['page'];
        $id = $data['id'];



        $pictures = DB::table('courses')
        ->join('courses', 'pictures.course_id', '=', 'courses.id')
        ->select('course_id', 'pictures.filename')
        ->where('course_id', 'id');


        $id =$request->id;





        $course_id = Course::findOrFail(3);

        $category = $course_id->pictures();
        $category->paginate(1);
*/

        //$category->setRelation('pictures', $category->pictures()->paginate(2));
        //return view('example', compact('category'));


/*
        $course = Course::where('id',$r)->get();
        $course->setRelation('pictures', $course->pictures()->paginate(10));

        return view('site.page')->with('pictures', $category);


*/
        //return view('',['id'=>$r]);

        /*
        return DB::select('


        ');

        */
    }


}
