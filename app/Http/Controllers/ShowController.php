<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use App\Traits\LoginTrait;
use App\Models\StatutTicket;
use App\Traits\ControlTrait;
use Illuminate\Support\Facades\Storage;


class ShowController extends Controller
{
    use LoginTrait;
    use ControlTrait;
        public function show($userID, $ticketID)
    {
        $this->auth($userID);
        $user     = User::find($userID);
        $ticket   = Ticket::find($ticketID);
        return view('tickets.show', compact('ticket', 'userID', 'user'));
    }
}
