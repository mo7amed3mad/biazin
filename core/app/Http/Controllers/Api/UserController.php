<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Member;

class UserController extends Controller
{
    public function get_user_info(Request $request)
    {
        $user_id = $request->user_id;

        $user_data = Member::where("id", $user_id)->first();

        $user_info =
        [
            $user_data->email,
            $user_data->fullname,
            $user_data->phone,
            $user_data->address,
            $user_data->occupation
        ];

        return response()->json(
        [
            "result" => true,
            "message" => "Data is ready",
            "user_info" => $user_info,
            "user_id" => $user_id
        ]);
    }

    public function save_user_info(Request $request)
    {
        $email = trim($request->email);
        $fullname = trim($request->fullname);
        $phone = trim($request->phone);
        $address = trim($request->address);
        $occupation = trim($request->occupation);

        $user_id = $request->user_id;

        $error = "";

        //Check Auth (Token)

        //Check Data
            //Check Email
                //Empty
                if($email == "" || $email == NULL)
                {
                    $email = Member::where("id", $user_id)->first()->email;
                }
                else
                {
                   //Validate Email
                   if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                   {
                       $error = "Email is not valid";
                   }
                }

            //Check Fullname
                //Empty
                if($fullname == "" || $fullname == NULL)
                {
                    $fullname = Member::where("id", $user_id)->first()->fullname;
                }
                else
                {
                    //Validate Full Name
                    if(!preg_match('/^[a-zA-Zگچپژیلفقهموكى ء-ي]*$/', $fullname))
                    {
                        $error = "Full name must be in letters only";
                    }
                }
            //Check Phone
                //Empty
                if($phone == "" || $phone == NULL)
                {
                    $phone = Member::where("id", $user_id)->first()->phone;
                }
                else
                {
                    //Validate Full Name
                    if(!preg_match('/^[0-9]*$/', $phone))
                    {
                        $error = "Phone Number is incorrect";
                    }
                }
            //Check Address
                //Empty
                if($address == "" || $address == NULL)
                {
                    $address = Member::where("id", $user_id)->first()->address;
                }
                else
                {
                    //Validate Full Name
                    if(!preg_match('/^[0-9a-zA-Zگچپژیلفقهموكى ء-ي]*$/', $address))
                    {
                        $error = "Address must be in letters and numbers only";
                    }
                }
            //Check Occupation
                //Empty
                if($occupation == "" || $occupation == NULL)
                {
                    $occupation = Member::where("id", $user_id)->first()->occupation;
                }
                else
                {
                    //Validate Full Name
                    if(!preg_match('/^[a-zA-Zگچپژیلفقهموكى ء-ي]*$/', $occupation))
                    {
                        $error = "Occubation must be in letters only";
                    }
                }
        //Save Data

        if($error != "")
        {
            return response()->json(
            [
                "result" => false,
                "message" => $error,
                "user_id" => $user_id
            ]);
        }


        Member::where("id", $user_id)->update(
        [
            "email" => $email,
            "fullname" => $fullname,
            "phone" => $phone,
            "address" => $address,
            "occupation" => $occupation
        ]);

        //Return Success Response
        return response()->json(
        [
            "result" => true,
            "message" => "Data has been updated successfully",
            "user_id" => $user_id
        ]);
    }
}