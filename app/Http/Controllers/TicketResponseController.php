<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\TicketResponse;
use Illuminate\Support\Facades\Auth;

class TicketResponseController extends Controller {

    /**
     * @param Request $request
     * @param Ticket $ticket
     */
    public function store( Request $request, Ticket $ticket ) {
        $request->validate( [
            'response' => 'required|string',
        ] );

        TicketResponse::create( [
            'ticket_id' => $ticket->id,
            'user_id'   => Auth::id(),
            'response'  => $request->response,
        ] );

        return redirect()->route( 'tickets.show', $ticket->id )->with( 'success', 'Response added successfully.' );
    }
}
