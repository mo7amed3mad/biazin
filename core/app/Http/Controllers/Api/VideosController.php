<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Video;
use App\Models\Celeb;

use URL;

class VideosController extends Controller
{
    //Get Videos
    public function get_videos(Request $request)
    {   
        $videos = Video::orderBy('created_at', 'desc')->take(5)->get();

        if($videos->count() > 0)
        {
            $links = [];

            foreach($videos as $video)
            {
                array_push($links, URL::to("/").$video->video);
            }
    
            return response()->json([
    
                "result" => true,
                "message" => "success",
                "user_id" => $request->user_id,
                "videos" => $links,
            ]);
        }
        else
        {
            return response()->json([
    
                "result" => true,
                "message" => "لا يوجد محتوى",
                "user_id" => $request->user_id,
                "videos" => $links,
            ]); 
        }
    }
}
