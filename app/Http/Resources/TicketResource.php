<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'type'=>'ticket',
            'id'=>$this->id,
            'attributes'=>[
                'title'=>$this->title,
                'description'=>$this->description,
                'status'=>$this->status,
                'createdAt'=>$this->created_at,
                'updatedAt'=>$this->updated_at
            ],
            'relationships'=>[
                'author'=>[
                    'data'=>[
                        'type'=>'user',
                        'id'=>$this->user_id
                    ]
                ]
            ],
            'includes'=>[
                new UserResource($this->user)
            ]
        ];
    }
}
