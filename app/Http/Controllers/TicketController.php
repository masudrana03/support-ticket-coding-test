<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Mail\TicketClosed;
use App\Mail\TicketOpened;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Auth::user()->isAdmin() ? Ticket::all() : Auth::user()->tickets;
        return view('backend.tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('backend.tickets.create');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject'     => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $ticket = Ticket::create([
            'user_id'     => Auth::id(),
            'subject'     => $request->subject,
            'description' => $request->description,
        ]);

        $admin = User::where('role', 'admin')->first();
        if ($admin) {
            Mail::to($admin->email)->send(new TicketOpened($ticket));
        }

        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully.');
    }

    /**
     * @param Ticket $ticket
     */
    public function show(Ticket $ticket)
    {
        return view('backend.tickets.show', compact('ticket'));
    }

    /**
     * @param Ticket $ticket
     */
    public function close(Ticket $ticket)
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('tickets.index')->with('error', 'You are not authorized to close tickets.');
        }

        $ticket->update([
            'status' => 'closed',
        ]);

        Mail::to($ticket->user->email)->send(new TicketClosed($ticket));

        return redirect()->route('tickets.index')->with('success', 'Ticket closed and customer notified successfully.');
    }

    /**
     * @param Ticket $ticket
     */
    public function reopen(Ticket $ticket)
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('tickets.index')->with('error', 'You are not authorized to close tickets.');
        }

        $ticket->update([
            'status' => 'open',
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket reopen successfully.');
    }

    public function destroy(Ticket $ticket)
    {
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('tickets.index')->with('error', 'You are not authorized to delete tickets.');
        }

        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully.');
    }
}
