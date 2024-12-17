<?php

namespace App\Http\Controllers;

use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return TicketResource::collection(Ticket::paginate());
    }

    public function show(Ticket $ticket)
    {
        return new TicketResource($ticket);
    }
}
