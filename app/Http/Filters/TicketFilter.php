<?php
namespace App\Http\Filters;

class TicketFilter extends QueryFilter {
    protected $sortable=[
        'title',
        'status',
        'createdAt'=>'created_at'
    ];
    public function include($value)
    {
        return $this->builder->with($value);
    }
    public function status($value)
    {
        return $this->builder->whereIn('status',explode(',',$value));
    }

    public function title($value)
    {
        $likeStr= str_replace('*', '%', $value);
        return $this->builder->where('title','like',$likeStr);
    }
}
