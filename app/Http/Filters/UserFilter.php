<?php
namespace App\Http\Filters;

class UserFilter extends QueryFilter {
    public function include($value)
    {
        return $this->builder->with($value);
    }
    public function id($value)
    {
        return $this->builder->whereIn('id',explode(',',$value));
    }

    public function name($value)
    {
        $likeStr= str_replace('*', '%', $value);
        return $this->builder->where('name','like',$likeStr);
    }
    public function email($value)
    {
        $likeStr= str_replace('*', '%', $value);
        return $this->builder->where('email','like',$likeStr);
    }
}
