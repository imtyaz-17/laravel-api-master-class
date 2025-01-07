<?php

namespace App\Http\Controllers;

use App\Http\Filters\TicketFilter;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class UserTicketController extends Controller
{
    public function index($userId, TicketFilter $filters)
    {
        return TicketResource::collection((Ticket::where('user_id',$userId)->filter($filters))->paginate());
    }
}
