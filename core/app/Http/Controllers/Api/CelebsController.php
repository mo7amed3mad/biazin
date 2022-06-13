<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

//Models
use App\Models\Celeb;
use App\Models\Review;
use App\Models\Video;
use App\Models\Magazine;
use App\Models\Following;

//Helpers
use URL;
use Str;
use Storage;
use File;

//Traits
use App\Http\Traits\encodeDecodeArrays;


class CelebsController extends Controller
{
    use encodeDecodeArrays;

    //Get Celeb Home
    public function get_celeb_home(Request $request)
    {
        //Get Celeb Info
        $celeb = Celeb::where("id", $request->user_id)->first();

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
        $first_name = explode(" ", $celeb->fullname)[0];

        return response()->json([

            "result" => true,
            "message" => 'success',
            "user_id" => $celeb->id,
            "first_name" => $first_name,
            "image" => URL::to('/').$celeb->image,
            "access_token" => $celeb->api_token,
            "top_five" => $tops
        ]);

    }

    //Save Video
    public function save_video(Request $request)
    { 
        
/*         return response()->json([

            "result" => true,
            "message" => (string)$request->file("content_video")->getSize(),
            "user_id" => $request->user_id,
        ]); */

        //Check If Request Has Files
        if($request->hasFile("content_video"))
        {
            $video = $request->file("content_video");
            $extension = $video->getClientOriginalExtension();
            $name = Str::random(50).".".$extension;
            
            //Check Video Extention
            //return $extension;
            if(strtolower($extension) != "mp4")
            {
                return response()->json([

                    "result" => false,
                    "message" => "الامتداد مسموح به هو MP4 فقط",
                    "user_id" => $request->user_id,
                ], 400);  
            }

            //Check Video Size
            $size_in_mb = File::size($video) / 1048576;

            if($size_in_mb > 100)
            {
                return response()->json([

                    "result" => false,
                    "message" => "ينبغي أن لا يتجاوز حجم الفديو 100 ميجا",
                    "user_id" => $request->user_id,
                ], 400);  
            }

            $video->move(public_path('/uploads/videos/'), $name);

            if(!File::exists(public_path('/uploads/videos/'), $name))
            {
                return response()->json([

                    "result" => false,
                    "message" => "فشل رفع الفديو",
                    "user_id" => $request->user_id,
                ], 400);
            }

            //Save Data In Database
            Video::create(
            [
                "celeb_id" => $request->user_id,
                "title" => $request->title,
                "video" => '/uploads/videos/'.$name,
                "description" => $request->description,
            ]);


            //Complete Process

            $link_of_vid = URL::to('/').'/uploads/videos/'.$name;

            return response()->json([

                "result" => true,
                "message" => "success",
                "video_url" => $link_of_vid,
                "user_id" => $request->user_id,
            ]);
            
        }
        else
        {
            return response()->json([

                "result" => false,
                "message" => "لم يتم اختيار فديو",
                "user_id" => NULL,
            ], 400);
        }

    }

    //Save File
    public function save_file(Request $request)
    {   
        //Check If Request Has Files
        if($request->hasFile("content_file"))
        {
            $filepdf = $request->file("content_file");
            $extension = $filepdf->getClientOriginalExtension();

            if($extension != "pdf")
            {
                return response()->json([

                    "result" => false,
                    "message" => "ينبغي أن يكون امتداد الملف PDF",
                    "user_id" => $request->user_id,
                ], 400);
            }

            //Check File Size
            $size_in_mb = File::size($filepdf) / 1048576;

            if($size_in_mb > 100)
            {
                return response()->json([

                    "result" => false,
                    "message" => "ينبغي أن لا يتجاوز حجم الملف 100 ميجا",
                    "user_id" => $request->user_id,
                ], 400);  
            }

            $name = Str::random(50).".".$extension;

            $filepdf->move(public_path('/uploads/celebpdfs/'), $name);

            if(!File::exists(public_path('/uploads/celebpdfs/'), $name))
            {
                return response()->json([

                    "result" => false,
                    "message" => "فشل رفع الملف",
                    "user_id" => $request->user_id,
                ], 400);
            }

            //Save Data In Database
            Magazine::create(
            [
                "celeb_id" => $request->user_id,
                "file_url" => '/uploads/celebpdfs/'.$name,
                "status" => 0,
            ]);


            //Complete Process

            $link_of_pdf = URL::to('/').'/uploads/celebpdfs/'.$name;

            return response()->json([

                "result" => true,
                "message" => "success",
                "file_url" => $link_of_pdf,
                "user_id" => $request->user_id,
            ]);
            
        }
        else
        {
            return response()->json([

                "result" => false,
                "message" => "لم يتم اختيار أي ملفات",
                "user_id" => NULL,
            ], 400);
        }

    }

    // Profile
    public function celeb_profile(Request $request)
    {
        $celeb_data = Celeb::where("id", $request->user_id)->first();
        $following = Following::where("source_id", $request->user_id)->get()->count();
        $followed_by = Following::where("target_id", $request->user_id)->get()->count();
        $videos_count = Video::where("celeb_id", $request->user_id)->get()->count();
        $videos = Video::where("celeb_id", $request->user_id)->orderBy('created_at', 'desc')->take(5)->get();

        $links = [];

        foreach($videos as $video)
        {
            array_push($links, URL::to("/").$video->video);
        }
        
        //Gather Data
        return response()->json([

            "result" => true,
            "message" => "success",
            "name" => $celeb_data->fullname,
            "image" => URL::to('/').$celeb_data->image,
            "specialization" => $celeb_data->spec,
            "bio" => $celeb_data->bio,
            "following" => $following,
            "followed_by" => $followed_by,
            "videos_count" => $videos_count,
            "videos" => $links
        ]);
    }



    public function get_celeb_info(Request $request)
    {
        $data = Celeb::where("id", $request->user_id)->first();
        
        $education = $data->education;
        $skills = $data->skills;
        $experience = $data->experience;

        //Managing Arrays For Database
        if($data->skills != NULL && $data->skills != "")
        {
            $skills = $this->decode_arrays($data->skills, "single");
        }

        if($data->education != "" && $data->education != NULL)
        {
            $education = $this->decode_arrays($data->education, "multi");
        }

        if($data->experience != "" && $data->experience != NULL)
        {
            $experience = $this->decode_arrays($data->experience, "multi");
        }


        return response()->json([

            "result" => true,
            "message" => "success",
            "user_id" => $request->user_id,
            "spec" => $data->spec,
            "bio" => $data->bio,
            "education" => $education,
            "skills" => $skills,
            "experience" => $experience,
            "image" => URL::to('/').$data->image,
        ]);
    }

    public function update_celeb_info(Request $request)
    {

        //Managing Arrays For Database
        if(count($request->skills) > 0 && $request->skills != NULL)
        {
            $skills = $this->encode_arrays($request->skills);
        }
        else
        {
            return response()->json(
            [
                "result" => false,
                "message" => "لا يجب ترك المهارات فارغة",
                "user_id" =>  $request->user_id
            ], 400);
        }

        if(count($request->education) > 0 && $request->education != NULL)
        {
            $education = $this->encode_arrays($request->education);
        }
        else
        {
            return response()->json(
            [
                "result" => false,
                "message" => "لا يجب ترك التعليم فارغ",
                "user_id" =>  $request->user_id
            ], 400);
        }

        $experience = Celeb::where("id", $request->user_id)->first()->experience;

        if(count($request->experience) > 0 && $request->experience != NULL)
        {
            $experience = $this->encode_arrays($request->experience);
        }


        //Check Bio Length
        if(mb_strlen($request->bio) > 500 || mb_strlen($request->bio) < 50)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "لا يجب أن تكون السيرة الذاتية أكبر من 500 حرف أو أقل من 50 حرف",
                "user_id" =>  $request->user_id
            ], 400);
        }

        //Check Specialization Length
        if(mb_strlen($request->spec) > 50 || mb_strlen($request->spec) < 10 )
        {
            return response()->json(
            [
                "result" => false,
                "message" => "لا يجب أن يكون التخصص أكبر من 50 حرف أو أقل من 10 أحرف",
                "user_id" =>  $request->user_id
            ], 400);
        }

        //Check Education Length
        if(mb_strlen($education) > 25000)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "معلومات التعليم كثيرة للغاية يرجى اختصارها",
                "user_id" =>  $request->user_id
            ], 400);
        }

        //Check Skills Length
        if(mb_strlen($skills) > 25000)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "تفاصيل المهارات كثيرة للغاية يرجى اختصارها",
                "user_id" =>  $request->user_id
            ], 400);
        }

        //Check Experience Length
        if(mb_strlen($experience) > 25000)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "تفاصيل الخبرات كثيرة للغاية يرجى اختصارها",
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

            $img->move(public_path('/uploads/images/celebs/profile/'), $img_name);

            if(!File::exists(public_path('/uploads/images/celebs/profile/'), $img_name))
            {
                return response()->json([

                    "result" => false,
                    "message" => "فشل رفع الصورة",
                    "user_id" => $request->user_id,
                ], 400);
            }

            //Save Data In Database
            Celeb::where("id", $request->user_id)->update(
            [
                "spec" => $request->spec,
                "bio" => $request->bio,
                "experience" => $experience,
                "skills" => $skills,
                "education" => $education,
                "image" => '/uploads/images/celebs/profile/'.$img_name
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
            Celeb::where("id", $request->user_id)->update(
            [
                "spec" => $request->spec,
                "bio" => $request->bio,
                "experience" => $experience,
                "skills" => $skills,
                "education" => $education,
            ]);

            return response()->json([

                "result" => true,
                "message" => "تم تحديث البيانات بنجاح",
                "user_id" => $request->user_id,
            ]); 
        }
    }


}
