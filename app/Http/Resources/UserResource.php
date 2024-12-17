<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin User */
class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'type'=>'user',
            'id'=>$this->id,
            'attributes'=>[
                'name'=>$this->name,
                'email'=>$this->email,
                $this->mergeWhen($request->routeIs('users.*'),[
                    'emailVerifiedAt'=>$this->email_varified_at,
                    'createdAt'=>$this->created_at,
                    'updatedAt'=>$this->updated_at
                ])
            ],
            'includes'=>TicketResource::collection($this->whenLoaded('tickets'))
        ];
    }
}
