<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Review;
use App\Models\Celeb;
use App\Models\Following;

use URL;
use Str;
use File;

class StudentsController extends Controller
{
    public function get_student_home(Request $request)
    {
        //Return Home Data
        $user_data = Student::where("id", $request->user_id)->first();

        //Get Celeb Reviews
        $tops = [];
        $top_celebs = Celeb::orderBy("rating", "DESC")->get();
        foreach($top_celebs as $tceleb)
        {
            $arr = 
            [
                "id" => $tceleb->id,
                "name" => $tceleb->fullname,
                "rating" => doubleval($tceleb->rating),
            ];

            $test = $tceleb;

            array_push($tops, $arr);
        }

        //Get Celeb First Name
        $first_name = explode(" ", $user_data->name)[0];

        if($user_data->image == NUll)
        {
            $image = URL::to('/')."/uploads/images/def_avatar.png";
        }
        else
        {
            $image = URL::to('/').$user_data->image;
        }

        return response()->json([

            "result" => true,
            "message" => "done",
            "user_id" => $user_data->id,
            "first_name" => $first_name,
            "image" => $image,
            "access_token" => $user_data->api_token,
            "top_five" => $tops
        ]);
        
    }



    public function get_student_info(Request $request)
    {
        $data = Student::where("id", $request->user_id)->first();

        return response()->json([

            "result" => true,
            "message" => "success",
            "user_id" => $request->user_id,
            "name" => $data->name,
            "occupation" => $data->occupation,
            "bio" => $data->bio,
            "image" => URL::to('/').$data->image,
        ]);
    }

    public function get_student_profile(Request $request)
    {
        $student_data = Student::where("id", $request->user_id)->first();
        $following = Following::where("source_id", $request->user_id)->get()->count();
        $followed_by = Following::where("target_id", $request->user_id)->get()->count();
        
        //Gather Data
        return response()->json([

            "result" => true,
            "message" => "success",
            "name" => $student_data->name,
            "image" => URL::to('/').$student_data->image,
            "specialization" => $student_data->occupation,
            "bio" => $student_data->bio,
            "following" => $following,
            "followed_by" => $followed_by,
        ]);
    }

    public function update_student_info(Request $request)
    {
        //Check If Name Empty
        if($request->name == "" || $request->name == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "لا يجب أن يكون الاسم فارغ",
                "user_id" => $request->user_id
            ], 400);
        }

        //Check Bio and Occupation Length
        if(mb_strlen($request->bio) > 500)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "لا يجب أن تكون السيرة الذاتية أكبر من 500 حرف",
                "user_id" =>  $request->user_id
            ], 400);
        }

        //Check Bio and Occupation Length
        if(mb_strlen($request->occupation) > 50)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "لا يجب أن تكون الوظيفة أكبر من 50 حرف",
                "user_id" =>  $request->user_id
            ], 400);
        }
        
        if($request->hasFile("image"))
        {
            $img = $request->file("image");
            $extension = $img->getClientOriginalExtension();
            $img_name = Str::random(50).".".$extension;
            
            //Check Image Extention
            if(!in_array(strtolower($extension), ["png", "jpg"]))
            {
                return response()->json([

                    "result" => false,
                    "message" => "ينبغي أن يكون امتداد الصورة png أو jpg فقط",
                    "user_id" => $request->user_id,
                ], 400);  
            }

            //Check img Size
            $size_in_mb = File::size($img) / 1048576;

            if($size_in_mb > 5)
            {
                return response()->json([

                    "result" => false,
                    "message" => "ينبغي أن لا يتجاوز حجم الصورة 5 ميجا",
                    "user_id" => $request->user_id,
                ], 400);  
            }

            $img->move(public_path('/uploads/images/students/profile/'), $img_name);

            if(!File::exists(public_path('/uploads/images/students/profile/'), $img_name))
            {
                return response()->json([

                    "result" => false,
                    "message" => "فشل رفع الصورة",
                    "user_id" => $request->user_id,
                ], 400);
            }

            //Save Data In Database
            Student::where("id", $request->user_id)->update(
            [
                "name" => $request->name,
                "occupation" => $request->occupation,
                "bio" => $request->bio,
                "image" => '/uploads/images/students/profile/'.$img_name
            ]);

            return response()->json([

                "result" => true,
                "message" => "تم تحديث البيانات بنجاح",
                "user_id" => $request->user_id,
            ]); 
        }
        else
        {
            //Save Data In Database
            Student::where("id", $request->user_id)->update(
            [
                "name" => $request->name,
                "occupation" => $request->occupation,
                "bio" => $request->bio
            ]);

            return response()->json([

                "result" => true,
                "message" => "تم تحديث البيانات بنجاح",
                "user_id" => $request->user_id,
            ]); 
        }
    }
    
}
