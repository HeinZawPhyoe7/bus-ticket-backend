<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ticket = Ticket::all();

        return response()->json([
            'ticket' => $ticket,
            'message' => 'success'
        ]);
    }

    public function search(Request $request)
    {
        $query = Ticket::query();

        if ($request->filled('from_city')) {
            $query->where('from_city', $request->from_city);
        }

        if ($request->filled('to_city')) {
            $query->where('to_city', $request->to_city);
        }

        if ($request->filled('date')) {
            $query->where('date', $request->date);
        }

        $tickets = $query->get();

        return response()->json($tickets); // Return JSON response or pass to a view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = new Ticket();
        $ticket->class = $request->class;
        $ticket->time = $request->time;
        $ticket->price = $request->price;
        $ticket->seat = $request->seat;
        $ticket->date = $request->date;
        $ticket->from_city = $request->from_city;
        $ticket->to_city = $request->to_city;
        $ticket->save();

        return response()->json([
            'message' => 'success',
            'class' => $ticket->class,
            'time' => $ticket->time,
            'price' => $ticket->price,
            'seat' => $ticket->seat,
            'date' => $ticket->date,
            'from_city' => $ticket->from_city,
            'to_city' => $ticket->to_city,

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($ticketId)
    {
        $ticketDetails = Ticket::find($ticketId); // OR ->where('id', $ticketId)->first()

        if (!$ticketDetails) {
            return response()->json(['message' => 'No ticket details found for this ticket_id.'], 404);
        }

        return response()->json([
            'ticket_details' => $ticketDetails,
            'message' => 'success'
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showcar()
    {
        $showCars = Ticket::where();
    }
}
