<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Hash;
use Str;
use PDO;

use App\Models\Student;
use App\Models\Celeb;
use App\Mail\resetUserPassword;
use App\Mail\emailConfirmation;
use App\Mail\celebPasswordReset;
use App\Mail\celebEmailConfirmation;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{

    // #################################### Celebreties #################################### //
    
    public function celeb_login(Request $request)
    {
        //Check Empty Login
        if($request->login == "" || $request->login == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => json_encode("يرجى ادخال الإيميل أو رقم الهاتف", JSON_UNESCAPED_UNICODE),
                "user_id" => 0
            ], 400);
        }

        //Check Empty Password
        if($request->password == "" || $request->password == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => json_encode("يرجى إدخال كلمة المرور", JSON_UNESCAPED_UNICODE),
                "user_id" => 0
            ], 400);
        }

        //Check If Login Email or Phone Number
        if(filter_var($request->login, FILTER_VALIDATE_EMAIL))
        {
            //Login is Email 
            $chk_email = Celeb::where("email", $request->login)->first();

            if($chk_email == NULL)
            {
                return response()->json(
                [
                    "result" => false,
                    "message" => json_encode("بيانات تسجيل الدخول غير صحيحة", JSON_UNESCAPED_UNICODE),
                    "user_id" => 0
                ], 400);
            }
            else
            {
                $stored_pass = Celeb::where("email", $request->login)->first()->password;

                if(Hash::check($request->password, $stored_pass))
                {
                    //Check If Email Verified
                    if($chk_email->status == TRUE)
                    {
                        //Check If New Token Will Be Generated
                        $user = Celeb::where("email", $request->login)->first();

                        if((strtotime("now") - $user->token_created) > 86400)
                        {
                            //Generate Token
                            $api_token = Str::random(300);

                            Celeb::where("email", $request->login)->update(
                            [
                                "api_token" => $api_token,
                                "token_created" => strtotime("now"),
                            ]);

                            return response()->json(
                            [
                                "result" => true,
                                "message" => "تم تسجيل الدخول بنجاح",
                                "user_id" => $user->id,
                                "phone" => $user->phone,
                                "email" => $user->email,
                                "name" => $user->fullname,
                                "access_token" => $api_token,
                            ]);
                        }
                        else
                        {
                            $api_token = Celeb::where("email", $request->login)->first()->api_token;

                            return response()->json(
                            [
                                "result" => true,
                                "message" => "تم تسجيل الدخول بنجاح",
                                "user_id" => $user->id,
                                "phone" => $user->phone,
                                "email" => $user->email,
                                "name" => $user->fullname,
                                "access_token" => $api_token,
                            ]);
                        }
                    }
                    else
                    {
                        return response()->json(
                        [
                            "result" => false,
                            "message" => json_encode("يرجى تفعيل حسابك من خلال الرابط المرسل الي ايميلك", JSON_UNESCAPED_UNICODE),
                            "user_id" => 0
                        ], 400);
                    }
                }
                else
                {
                    return response()->json(
                    [
                        "result" => false,
                        "message" => json_encode("بيانات تسجيل الدخول غير صحيحة", JSON_UNESCAPED_UNICODE),
                        "user_id" => 0
                    ], 400);
                }
            }
        }
        else
        {
            //Login is Phone number
            //Login is Email 
            $chk_phone = Celeb::where("phone", $request->login)->first();

            if($chk_phone == NULL)
            {
                return response()->json(
                [
                    "result" => false,
                    "message" => json_encode("بيانات تسجيل الدخول غير صحيحة", JSON_UNESCAPED_UNICODE),
                    "user_id" => 0
                ], 400);
            }
            else
            {
                $stored_pass = Celeb::where("phone", $request->login)->first()->password;

                if(Hash::check($request->password, $stored_pass))
                {
                    //Check If Email Verified
                    if($chk_phone->status == TRUE)
                    {
                        //Check If New Token Will Be Generated
                        $user = Celeb::where("phone", $request->login)->first();

                        if((strtotime("now") - $user->token_created) > 86400)
                        {
                            //Generate Token
                            $api_token = Str::random(300);

                            Celeb::where("phone", $request->login)->update(
                            [
                                "api_token" => $api_token,
                                "token_created" => strtotime("now"),
                            ]);

                            return response()->json(
                            [
                                "result" => true,
                                "message" => "تم تسجيل الدخول بنجاح",
                                "user_id" => $user->id,
                                "phone" => $user->phone,
                                "email" => $user->email,
                                "name" => $user->fullname,
                                "access_token" => $api_token,
                            ]);
                        }
                        else
                        {
                            $api_token = Celeb::where("phone", $request->login)->first()->api_token;

                            return response()->json(
                            [
                                "result" => true,
                                "message" => "تم تسجيل الدخول بنجاح",
                                "user_id" => $user->id,
                                "phone" => $user->phone,
                                "email" => $user->email,
                                "name" => $user->fullname,
                                "access_token" => $api_token,
                            ]);
                        }
                    }
                    else
                    {
                        return response()->json(
                        [
                            "result" => false,
                            "message" => json_encode("يرجى تفعيل حسابك من خلال الرابط المرسل الي ايميلك", JSON_UNESCAPED_UNICODE),
                            "user_id" => 0
                        ], 400);
                    }
                }
                else
                {
                    return response()->json(
                    [
                        "result" => false,
                        "message" => json_encode("بيانات تسجيل الدخول غير صحيحة", JSON_UNESCAPED_UNICODE),
                        "user_id" => 0
                    ], 400);
                }
            }
        }

    }

    public function celeb_register(Request $request)
    {
        //Check Name Length and if Empty
        if($request->fullname == "" || $request->fullname == NULL || mb_strlen($request->fullname) < 6 || mb_strlen($request->name) > 50)
        {
            return response()->json(
            [
                "result" => false,
                "message" => json_encode("لا يجب أن يقل الاسم عن 6 أحرف ولا يزيد عن 50", JSON_UNESCAPED_UNICODE),
                "user_id" => 0
            ], 400);
        }

        //Check Name if Contains Strange Characters
        if(preg_match("/[^a-zA-Zگچپژیلفقهموكى ء-ي]/", $request->fullname))
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن يتكون الاسم من احرف ومسافات فقط",
                "user_id" => 0
            ], 400);
        }

        //Check Name if contains more than two spaces
        if(substr_count($request->fullname, " ") > 2)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن لا يحتوي الاسم أكثر من مسافتين",
                "user_id" => 0
            ], 400);
        }

        //Check Email if Empty
        if($request->email == "" || $request->email == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "الإيميل مطلوب",
                "user_id" => 0
            ], 400);
        }

        //Check Email Validity
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL))
        {
            return response()->json(
            [
                "result" => false,
                "message" => "إيميل غير صالح. يرجى التحقق",
                "user_id" => 0
            ], 400);
        }

        //Check Email if Exists
        $email_count = Student::where("email", $request->email)->get()->count();
        $email_count_two = Celeb::where("email", $request->email)->get()->count();

        if($email_count > 0 || $email_count_two > 0)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "هذا الايميل مسجل من قبل",
                "user_id" => 0
            ], 400);
        }

        //Check if Password if Empty
        if($request->password == "" || $request->password == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "كلمة المرور مطلوبة",
                "user_id" => 0
            ], 400);
        }

        //Check if Password is Less Than 8 Chars
        if(mb_strlen($request->password) < 8 || mb_strlen($request->password) > 30)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن لا تقل كلمة المرور عن 8 أحرف ولا تزيد عن 30",
                "user_id" => 0
            ], 400);
        }

        //Check Password
        if(!preg_match('/^[a-zA-Z0-9#@_$-]*$/', $request->password))
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن تتكون كلمة المرور من أحرف لاتينية فقط ورموز مثل #@_$-",
                "user_id" => 0
            ], 400); 
        }

        //Check Phone Structure
        if(preg_match("/[^0-9]/", $request->phone))
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن يتكون رقم الهاتف من أرقام فقط",
                "user_id" => 0
            ], 400);
        }

        //Check Phone Count
        if(mb_strlen($request->phone) != 11 || $request->phone[0] != "0" || $request->phone[1] != "1")
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن يتكون رقم الهاتف من 11 رقم ويبدأ بـ 01",
                "user_id" => 0
            ], 400);
        }

        //Check if Phone Exists
        $phone_count = Student::where("phone", $request->phone)->get()->count();
        $phone_count_two = Celeb::where("phone", $request->phone)->get()->count();

        if($phone_count > 0 || $phone_count_two > 0)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "رقم الهاتف هذا مسجل من قبل",
                "user_id" => 0
            ], 400);
        }
        
        $c_otp = rand(11111111, 99999999);

        //Creeate User
        Celeb::create(
        [
            "fullname" => $request->fullname,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "phone" => $request->phone,
            "image" => '/uploads/images/def_avatar.png',
            "confirmation_otp" => $c_otp,
            "status" => FALSE,
        ]);

        //Send Email Verification Message
        Mail::to($request->email)->send(new celebEmailConfirmation($c_otp));

        $celeb_id = Celeb::where("email", $request->email)->first()->id;

        return response()->json(
        [
            "result" => true,
            "user_type"=>"Celeb",
            "message" => "تم التسجيل بنجاح. يرجى تفعيل حسابك من خلال الكود المرسل إلى بريدك الاليكتروني",
            "user_id" => $celeb_id
        ]);
    }

    public function celeb_activate_account(Request $request)
    {
        //Check Data
        if($request->otp == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "كود التفعيل مطلوب",
                "user_id" => 0
            ], 400);   
        }

        if($request->user_id == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "حدث خطأ ما",
                "user_id" => 0
            ], 400);   
        }

        $user_c_otp = Celeb::where("id", $request->user_id)->first()->confirmation_otp;

        if($user_c_otp != $request->otp)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "كود التفعيل خاطئ",
                "user_id" => 0
            ], 400);    
        }

        //Generate Token
        $api_token = Str::random(300);

        Celeb::where("id", $request->user_id)->update(
        [
            "confirmation_otp" => NULL,
            "status" => TRUE,
            "api_token" => $api_token,
            "token_created" => strtotime("now")
        ]);

        return response()->json(
        [
            "result" => true,
            "message" => "تم تفعيل حسابك بنجاح",
            "user_type" => "celeb",
            "access_token" => $api_token,
            "user_id" => $request->user_id
        ]);    
    }
    
    public function celeb_forget_password(Request $request)
    {
        //Check if Email Empty
        if($request->email == "" || $request->email == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "الايميل مطلوب",
                "user_id" => 0
            ], 400);
        }

        //Check Email
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL))
        {
            return response()->json(
            [
                "result" => false,
                "message" => "الايميل خاطئ. يرجى التحقق",
                "user_id" => 0
            ], 400);
        }

        //Check If Email Already Registered
        $email_count = Celeb::where("email", $request->email)->get()->count();
        
        if($email_count == 0)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "هذا الايميل غير مسجل",
                "user_id" => 0
            ], 400);
        }

        //Generate OTP
        $otp = rand(11111111, 99999999);

        //Save OTP in Database
        Celeb::where("email", $request->email)->update(
        [
            "otp" => $otp,
            "resettime" => strtotime("now")
        ]);


        //Send The otp
        Mail::to($request->email)->send(new celebPasswordReset($otp));

        $user_id = Celeb::where("email", $request->email)->first()->id;

        return response()->json(
        [
            "result" => true,
            "message" => "تم ارسال كود إستعادة كلمة المرور الي ايميلك",
            "user_id" => $user_id
        ]);

    }

    public function celeb_reset_password(Request $request)
    {
        //Set Data in Variables
        $otp = $request->otp;
        $password = $request->newpassword;
        $passwordconf = $request->newpasswordconf;

        if(!$request->user_id || $request->user_id == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "حدث خطأ ما",
                "user_id" => 0,
            ], 400);
        }

        //OTP
        if($otp == NULL || $otp == "")
        {
            return response()->json(
            [
                "result" => false,
                "message" => "كود التفعيل مطلوب",
                "user_id" => 0,
            ], 400);
        }

        $otp = preg_replace('/[^0-9]/', "", $otp);

        //Password
        if($password == NULL || $password == "")
        {
            return response()->json(
            [
                "result" => false,
                "message" => "كلمة المرور الجديدة مطلوبة",
                "user_id" => 0,
            ], 400);
        }

        if(!preg_match('/^[a-zA-Z0-9#@_$-]*$/', $password))
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن تتكون كلمة المرور من أحرف لاتينية فقط ورموز مثل #@_$-",
                "user_id" => 0,
            ], 400);
        }

        if(mb_strlen($password) < 8)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن لا تقل كلمة المرور عن 8 أحرف",
                "user_id" => 0,
            ], 400);
        }

        if($password != $passwordconf)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "كلمة المرور لا تتطابق تأكيدها",
                "user_id" => 0,
            ], 400);
        }

        //Check If OTP Correct
        $user_otp = Celeb::where("id", $request->user_id)->first()->otp;

        if($user_otp != $otp)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "كود التفعيل خاطئ",
                "user_id" => 0,
            ], 400);
        }

        //Save Date
        $api_token = Str::random(300);

        Celeb::where("id", $request->user_id)->update(
        [
            "password" => Hash::make($password),
            "otp" => NULL,
            "api_token" => $api_token,
            "resettime" => NULL
        ]);


        return response()->json(
        [
            "result" => true,
            "message" => "تم إعادة تعيين علمة المرور بنجاح",
            "user_id" => $request->user_id,
        ]);
        
    }

    // #################################### STUDENTS #################################### //

    public function student_login(Request $request)
    {
        //Check Empty Login
        if($request->login == "" || $request->login == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => json_encode("يرجى ادخال الإيميل أو رقم الهاتف", JSON_UNESCAPED_UNICODE),
                "user_id" => 0
            ], 400);
        }

        //Check Empty Password
        if($request->password == "" || $request->password == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => json_encode("يرجى إدخال كلمة المرور", JSON_UNESCAPED_UNICODE),
                "user_id" => 0
            ], 400);
        }

        //Check If Login Email or Phone Number
        if(filter_var($request->login, FILTER_VALIDATE_EMAIL))
        {
           //Login is Email 
           $chk_email = Student::where("email", $request->login)->first();

           if($chk_email == NULL)
           {
                return response()->json(
                [
                    "result" => false,
                    "message" => json_encode("بيانات تسجيل الدخول غير صحيحة", JSON_UNESCAPED_UNICODE),
                    "user_id" => 0
                ], 400);
           }
           else
           {
               $stored_pass = Student::where("email", $request->login)->first()->password;

               if(Hash::check($request->password, $stored_pass))
               {
                   //Check If Email Verified
                   if($chk_email->status == TRUE)
                   {
                        //Login
                        //Generate Token
                        $api_token = Str::random(300);
                        
                        Student::where("email", $request->login)->update(
                        [
                            "api_token" => $api_token,
                        ]);

                        return response()->json(
                        [
                            "result" => true,
                            "user_type" => "student",
                            "message" => "تم تسجيل الدخول بنجاح",
                            "user_id" => $chk_email->id,
                            "phone" => $chk_email->phone,
                            "email" => $chk_email->email,
                            "name" => $chk_email->name,
                            "access_token" => $api_token,
                        ]);
                   }
                   else
                   {
                        return response()->json(
                        [
                            "result" => false,
                            "message" => json_encode("يرجى تفعيل حسابك من خلال الرابط المرسل الي ايميلك", JSON_UNESCAPED_UNICODE),
                            "user_id" => 0
                        ], 400);
                   }
               }
               else
               {
                    return response()->json(
                    [
                        "result" => false,
                        "message" => json_encode("بيانات تسجيل الدخول غير صحيحة", JSON_UNESCAPED_UNICODE),
                        "user_id" => 0
                    ], 400);
               }
           }
        }
        else
        {
            //Login is Phone number
            //Login is Email 
           $chk_phone = Student::where("phone", $request->login)->first();

           if($chk_phone == NULL)
           {
                return response()->json(
                [
                    "result" => false,
                    "message" => json_encode("بيانات تسجيل الدخول غير صحيحة", JSON_UNESCAPED_UNICODE),
                    "user_id" => 0
                ], 400);
           }
           else
           {
               $stored_pass = Student::where("phone", $request->login)->first()->password;

               if(Hash::check($request->password, $stored_pass))
               {
                   //Check If Email Verified
                   if($chk_phone->status == TRUE)
                   {
                        //Login
                        //Generate Token
                        $api_token = Str::random(300);
                        
                        Student::where("phone", $request->login)->update(
                        [
                            "api_token" => $api_token,
                        ]);

                        return response()->json(
                        [
                            "result" => true,
                            "user_type" => "student",
                            "message" => "تم تسجيل الدخول بنجاح",
                            "user_id" => $chk_phone->id,
                            "phone" => $chk_phone->phone,
                            "email" => $chk_phone->email,
                            "name" => $chk_phone->name,
                            "access_token" => $api_token,
                        ]);
                   }
                   else
                   {
                        return response()->json(
                        [
                            "result" => false,
                            "message" => json_encode("يرجى تفعيل حسابك من خلال الرابط المرسل الي ايميلك", JSON_UNESCAPED_UNICODE),
                            "user_id" => 0
                        ], 400);
                   }
               }
               else
               {
                    return response()->json(
                    [
                        "result" => false,
                        "message" => json_encode("بيانات تسجيل الدخول غير صحيحة", JSON_UNESCAPED_UNICODE),
                        "user_id" => 0
                    ], 400);
               }
           }
        }

    }

    public function student_register(Request $request)
    {
        //Check Name Length and if Empty
        if($request->name == "" || $request->name == NULL || mb_strlen($request->name) < 6 || mb_strlen($request->name) > 50)
        {
            return response()->json(
            [
                "result" => false,
                "message" => json_encode("لا يجب أن يقل الاسم عن 6 أحرف ولا يزيد عن 50", JSON_UNESCAPED_UNICODE),
                "user_id" => 0
            ], 400);
        }

        //Check Name if Contains Strange Characters
        if(preg_match("/[^a-zA-Zگچپژیلفقهموكى ء-ي]/", $request->name))
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن يتكون الاسم من احرف ومسافات فقط",
                "user_id" => 0
            ], 400);
        }

        //Check Name if contains more than two spaces
        if(substr_count($request->name, " ") > 2)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن لا يحتوي الاسم أكثر من مسافتين",
                "user_id" => 0
            ], 400);
        }

        //Check Email if Empty
        if($request->email == "" || $request->email == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "الإيميل مطلوب",
                "user_id" => 0
            ], 400);
        }

        //Check Email Validity
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL))
        {
            return response()->json(
            [
                "result" => false,
                "message" => "إيميل غير صالح. يرجى التحقق",
                "user_id" => 0
            ], 400);
        }

        //Check Email if Exists
        $email_count = Student::where("email", $request->email)->get()->count();
        $email_count_two = Celeb::where("email", $request->email)->get()->count();

        if($email_count > 0 || $email_count_two > 0)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "هذا الايميل مسجل من قبل",
                "user_id" => 0
            ], 400);
        }

        //Check if Password if Empty
        if($request->password == "" || $request->password == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "كلمة المرور مطلوبة",
                "user_id" => 0
            ], 400);
        }

        //Check if Password is Less Than 8 Chars
        if(mb_strlen($request->password) < 8 || mb_strlen($request->password) > 30)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن لا تقل كلمة المرور عن 8 أحرف ولا تزيد عن 30",
                "user_id" => 0
            ], 400);
        }

        //Check Password
        if(!preg_match('/^[a-zA-Z0-9#@_$-]*$/', $request->password))
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن تتكون كلمة المرور من أحرف لاتينية فقط ورموز مثل #@_$-",
                "user_id" => 0
            ], 400); 
        }

        //Check Phone Structure
        if(preg_match("/[^0-9]/", $request->phone))
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن يتكون رقم الهاتف من أرقام فقط",
                "user_id" => 0
            ], 400);
        }

        //Check Phone Count
        if(mb_strlen($request->phone) != 11 || $request->phone[0] != "0" || $request->phone[1] != "1")
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن يتكون رقم الهاتف من 11 رقم ويبدأ بـ 01",
                "user_id" => 0
            ], 400);
        }

        //Check if Phone Exists
        $phone_count = Student::where("phone", $request->phone)->get()->count();
        $phone_count_two = Celeb::where("phone", $request->phone)->get()->count();

        if($phone_count > 0 || $phone_count_two > 0)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "رقم الهاتف هذا مسجل من قبل",
                "user_id" => 0
            ], 400);
        }
        
        $c_otp = rand(11111111, 99999999);

        //Creeate User
        Student::create(
        [
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "phone" => $request->phone,
            "image" => '/uploads/images/def_avatar.png',
            "confirmation_otp" => $c_otp,
            "status" => FALSE,
        ]);

        //Send Email Verification Message

        Mail::to($request->email)->send(new emailConfirmation($c_otp));

        $student_id = Student::where("email", $request->email)->first()->id;

        return response()->json(
        [
            "result" => true,
            "user_type"=>"student",
            "message" => "تم التسجيل بنجاح. يرجى تفعيل حسابك من خلال الكود المرسل إلى بريدك الاليكتروني",
            "user_id" => $student_id
        ]);
    }

    public function student_activate_account(Request $request)
    {
        //Check Data
        if($request->otp == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "كود التفعيل مطلوب",
                "user_id" => 0
            ], 400);   
        }

        if($request->user_id == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "حدث خطأ ما",
                "user_id" => 0
            ], 400);   
        }

        $user_c_otp = Student::where("id", $request->user_id)->first()->confirmation_otp;

        if($user_c_otp != $request->otp)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "كود التفعيل خاطئ",
                "user_id" => 0
            ], 400);    
        }

        //Generate Token
        $api_token = Str::random(300);

        Student::where("id", $request->user_id)->update(
        [
            "confirmation_otp" => NULL,
            "status" => TRUE,
            "api_token" => $api_token
        ]);

        return response()->json(
        [
            "result" => true,
            "message" => "تم تفعيل حسابك بنجاح",
            "user_type" => "student",
            "access_token" => $api_token,
            "user_id" => $request->user_id
        ]);    
    }
    
    public function student_forget_password(Request $request)
    {
        $rules = 
        [
            "name" => "required",
        ];
        
        $msg = 
        [
            "name.required" => "name required"
        ];

        $this->validate($request, $rules, $msg);

        //Check if Email Empty
        if($request->email == "" || $request->email == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "الايميل مطلوب",
                "user_id" => 0
            ], 400);
        }

        //Check Email
        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL))
        {
            return response()->json(
            [
                "result" => false,
                "message" => "الايميل خاطئ. يرجى التحقق",
                "user_id" => 0
            ], 400);
        }

        //Check If Email Already Registered
        $email_count = Student::where("email", $request->email)->get()->count();
        
        if($email_count == 0)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "هذا الايميل غير مسجل",
                "user_id" => 0
            ], 400);
        }

        //Generate OTP
        $otp = rand(11111111, 99999999);

        //Save OTP in Database
        Student::where("email", $request->email)->update(
        [
            "otp" => $otp,
            "resettime" => strtotime("now")
        ]);


        //Send The otp

        Mail::to($request->email)->send(new resetUserPassword($otp));

        $user_id = Student::where("email", $request->email)->first()->id;

        return response()->json(
        [
            "result" => true,
            "message" => "تم ارسال كود إستعادة كلمة المرور الي ايميلك",
            "user_id" => $user_id
        ]);

    }

    public function student_reset_password(Request $request)
    {
        //Set Data in Variables
        $otp = $request->otp;
        $password = $request->newpassword;
        $passwordconf = $request->newpasswordconf;

        if(!$request->user_id || $request->user_id == NULL)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "حدث خطأ ما",
                "user_id" => 0,
            ], 400);
        }

        //OTP
        if($otp == NULL || $otp == "")
        {
            return response()->json(
            [
                "result" => false,
                "message" => "كود التفعيل مطلوب",
                "user_id" => 0,
            ], 400);
        }

        $otp = preg_replace('/[^0-9]/', "", $otp);

        //Password
        if($password == NULL || $password == "")
        {
            return response()->json(
            [
                "result" => false,
                "message" => "كلمة المرور الجديدة مطلوبة",
                "user_id" => 0,
            ], 400);
        }

        if(!preg_match('/^[a-zA-Z0-9#@_$-]*$/', $password))
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن تتكون كلمة المرور من أحرف لاتينية فقط ورموز مثل #@_$-",
                "user_id" => 0,
            ], 400);
        }

        if(mb_strlen($password) < 8)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "يجب أن لا تقل كلمة المرور عن 8 أحرف",
                "user_id" => 0,
            ], 400);
        }

        if($password != $passwordconf)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "كلمة المرور لا تتطابق تأكيدها",
                "user_id" => 0,
            ], 400);
        }

        //Check If OTP Correct
        $user_otp = Student::where("id", $request->user_id)->first()->otp;

        if($user_otp != $otp)
        {
            return response()->json(
            [
                "result" => false,
                "message" => "كود التفعيل خاطئ",
                "user_id" => 0,
            ], 400);
        }

        //Save Date
        Student::where("id", $request->user_id)->update(
        [
            "password" => Hash::make($password),
            "otp" => NULL,
            "resettime" => NULL
        ]);


        return response()->json(
        [
            "result" => true,
            "message" => "تم إعادة تعيين علمة المرور بنجاح",
            "user_id" => $request->user_id,
        ]);
        
    }

}
