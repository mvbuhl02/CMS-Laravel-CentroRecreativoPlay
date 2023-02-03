<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

use App\Models\Picture;


class GalleryController extends Controller
{


    public function loadPictures(Request $request){
    $id =  $request->id;
    $page = $request->page;
    $max = 2;
    $ofs = ($page * $max) - $max;

    $pictures = DB::table('pictures')
    ->where('course_id', $id)
    ->offset($ofs)
    ->limit($max)
    ->select('filename', 'width', 'height')
    ->orderBy('id', 'DESC')
    ->get();

$pictures_json = $pictures->map(function($pic) {

    $data = [
        'src' => 'media/courses/pictures/'.$pic->filename,
        'width' => $pic->width,
        'height' => $pic->height
    ];
    return $data;
});

    return json_encode($pictures_json);

    }
}
