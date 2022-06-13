<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Officialmagazine;
use App\Models\Celeb;

use URL;

class MagazineController extends Controller
{
    //Get App Magazine
    public function get_app_magazine(Request $request)
    {   
        $magazine = Officialmagazine::orderBy('issue_date', 'desc')->take(1)->first();

        //Check IF User Authorized
        $contribs_arr = explode("+", $magazine->contribs);

        if(!in_array($request->user_id, $contribs_arr))
        {
            return response()->json([

                "result" => true,
                "message" => "لا تمتلك صلاحيات للوصول للمجلة",
                "user_id" => $request->user_id,
            ]);
        }

        //Check IF Magazine Is Ready
        if($magazine->status == FALSE)
        {
            return response()->json([

                "result" => true,
                "message" => "المجلة قيد التجهيز",
                "user_id" => $request->user_id,
            ], 400);
        }

        //Get Magazine
        return response()->json([

            "result" => true,
            "message" => "success",
            "user_id" => $request->user_id,
            "magazine" => URL::to("/").$magazine->mag_url,
        ]);
    }
}