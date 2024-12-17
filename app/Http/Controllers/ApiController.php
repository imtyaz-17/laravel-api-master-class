<?php

namespace App\Http\Controllers;

class ApiController extends Controller
{
    public function include(string $relationship):bool
    {
        $param = request()->get('include');
        if(!isset($param)){
            return false;
        }
        $includeValues = explode(',',strtolower($param));
        return in_array(strtolower($relationship),$includeValues);
    }
}
