<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\Celeb;
use App\Models\Student;

use Hash;

class apiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check If Student or Celeb
        if($request->user_type == NULL || $request->user_type == "")
        {
            $celeb_chk = Celeb::where("api_token", $request->access_token)->first();

            if($celeb_chk == NULL)
            {
                return response()->json(
                [
                    "result" => false,
                    "message" => "access denied",
                    "user_id" => $request->user_id
                ], 403);
            }
            else
            {
                if($request->user_id == NULL || $request->user_id == "")
                {
                    return response()->json(
                    [
                        "result" => false,
                        "message" => "Access Denied",
                        "user_id" => 0
                    ], 403);
                }
        
                $genarl_chk = Celeb::where("id", $request->user_id)->first();
        
                if($genarl_chk == NULL) 
                {
                    return response()->json(
                    [
                        "result" => false,
                        "message" => "Access Denied",
                        "user_id" => 0
                    ]);
                }
        
                if($request->access_token != $genarl_chk->api_token) 
                {
                    return response()->json(
                    [
                        "result" => false,
                        "message" => "Access Denied",
                        "user_id" => 0
                    ], 403);
                }
                
                return $next($request);
            }
        }
        else
        {
            $student_chk = Student::where("api_token", $request->access_token)->first();

            if($student_chk == NULL)
            {
                http_response_code(403);
                
                return response()->json(
                [
                    "result" => false,
                    "message" => "access denied",
                    "user_id" => $request->user_id
                ], 403);
            }
            else
            {
                if($request->user_id == NULL || $request->user_id == "")
                {
                    return response()->json(
                    [
                        "result" => false,
                        "message" => "Access Denied",
                        "user_id" => 0
                    ], 403);
                }
        
                $genarl_chk = Student::where("id", $request->user_id)->first();
        
                if($genarl_chk == NULL) 
                {
                    return response()->json(
                    [
                        "result" => false,
                        "message" => "Access Denied",
                        "user_id" => 0
                    ], 403);
                }
        
                if($request->access_token != $genarl_chk->api_token) 
                {
                    return response()->json(
                    [
                        "result" => false,
                        "message" => "Access Denied",
                        "user_id" => 0
                    ], 403);
                }

                return $next($request);
            }
        }
    }
}

//, 200, [], JSON_UNESCAPED_UNICODE