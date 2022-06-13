<?php

namespace App\Http\Traits;

trait encodeDecodeArrays
{
    public function encode_arrays($array)
    {
        $data = "";

        if(count($array) == count($array, COUNT_RECURSIVE)) 
        {
            for($i=0; $i<count($array); $i++)
            {
                if((count($array) - 1) == $i)
                {
                    $data .= $array[$i];
                }
                else
                {
                    $data .= $array[$i]."_xXx_||_779";
                }
            }

            return $data;
        }
        else
        { 
            for($n=0; $n<count($array); $n++)
            {
                if((count($array) - 1) == $n)
                {
                    for($i=0; $i<count($array[$n]); $i++)
                    {
                        if((count($array[$n]) - 1) == $i)
                        {
                            $data .= $array[$n][$i];
                        }
                        else
                        {
                            $data .= $array[$n][$i]."_xXx_||_779";
                        }
                    }

                }
                else
                {
                    for($i=0; $i<count($array[$n]); $i++)
                    {
                        if((count($array[$n]) - 1) == $i)
                        {
                            $data .= $array[$n][$i];
                        }
                        else
                        {
                            $data .= $array[$n][$i]."_xXx_||_779";
                        }
                    }

                    $data .= "__||__||__02020__";
                }

            }

            return $data;
        }
    }

    public function decode_arrays($array, $guide)
    {
        $arr = [];
        $temp_arr = [];

        if($guide == "single") 
        {
            return explode("_xXx_||_779", $array);
        }
        else
        { 
            $array = explode("__||__||__02020__", $array);
            
            for($n=0; $n<count($array); $n++)
            {
                $array2 = explode("_xXx_||_779", $array[$n]);

                for($i=0; $i<count($array2); $i++)
                {
                    array_push($temp_arr, $array2[$i]);
                }

                array_push($arr, $temp_arr);
                $temp_arr = [];
            }

            return $arr;
        }
    }
}