<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Showcase;
use App\Models\GalleryOne;
use App\Models\GalleryTwo;
use App\Models\Slider;
use App\Models\Team;
use App\Models\About;
use App\Models\Picture;
use App\Models\Course;
use App\Models\Us;
use App\Models\Sobre;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(){
        $slider= Slider::all();
        $courses = Course::all();

        //$courses->pictures()->paginate(2);
        //$pictures = Picture::all();
        //$courses->where('course_id', $pictures->id)->paginate(1);

        //$category = Course::where('id', $id)->first();

        //$category->setRelation('pictures', $category->pictures()->paginate(1));
        //$courses = Course::id();

        //$webDesigns = $courses->pictures()->where('course_id', 1)->get();
        //return  $webDesigns;

        //return dd($courses);


        //$courses = Course::with(['pictures'],paginate(1));


/*
        $pictures = DB::table('courses')
        ->join('courses', 'pictures.course_id', '=', 'courses.id')
        ->select('course_id', 'pictures.filename')
        ->where('course_id', 'id')
        ->paginate(3);
*/



\DB::enableQueryLog();

        //$categories= Category::with('posts')->paginate(1);


/*
        $pictures->load(relations: 'course');

        foreach ($pictures as $c) {
            echo $c->course->title;
        }
*/



/*
        foreach ($courses as $c) {
            foreach ($c->pictures as $p) {
                echo $p->filename."<hr>";
            }
        }


        dd(\DB::getQueryLog());
*/


        //return dd($courses);

        //$pictures = DB::table('pictures');
        //c = Course::pictures()->paginate(1);
        //$c =  Course::paginate(1);



        /*
        foreach($c as $co){
            foreach($co->pictures->paginate(1) as $p){
                echo $p->filename;
            }
        };
        */
        $pictures = Picture::where('course_id', request('id'))
        ->paginate(1);
        $us = Us::all();
        $team = Team::all();
        $about = About::all();
        $main_slide = DB::table('slider')->where('main', 1)->select('slide')->first();

/*
        $value = Cache::remember('main_slide', 50, function () {
            return DB::table('slider')->where('main', 1)->select('slide')->first();
        });
*/
        //return $c;
        /*
        return view('site.page', [
            'courses' => $courses
        ]);
        */
        //return dd($c);

























        return view('site.index', [

            'slider' => $slider,
            'courses' => $courses,
            'pictures' => $pictures,
            'us' => $us,
            'team' => $team,
            'about' => $about,
            'main_slide' => $main_slide
        ]);

    }



}


