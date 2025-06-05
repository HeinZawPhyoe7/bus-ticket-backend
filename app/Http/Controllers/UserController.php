<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'gender' => 'required|in:Male,Female,Group,Monk',
            'nation' => 'required|in:NRC,Passport,Other',
            'state' => 'required|numeric',
            'town' => 'required|string|max:50',
            'citizenship' => 'required|in:C,AC,NC,V,M,N',
            'nrc_number' => 'required|numeric',
            'payment' => 'required|in:Booking,Payment',
            'pickup_place' => 'required|string|max:100',
            'selected_seat_no' => 'required|array|min:1',
            'ticket_id' => 'required|exists:tickets,id',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->nation = $request->nation;
        $user->state = $request->state;
        $user->town = $request->town;
        $user->citizenship = $request->citizenship;
        $user->nrc_number = $request->nrc_number;
        $user->payment = $request->payment;
        $user->pickup_place = $request->pickup_place;
        $user->selected_seat_no = $request->selected_seat_no;
        $user->total_seat = $request->total_seat;
        $user->ticket_id = $request->ticket_id;
        $user->save();

        return response()->json([
            'message' => 'success',
            'name' => $user->name,
            'phone' => $user->phone,
            'email' => $user->email,
            'gender' => $user->gender,
            'nation' => $user->nation,
            'state' => $user->state,
            'town' => $user->town,
            'citizenship' => $user->citizenship,
            'nrc_number' => $user->nrc_number,
            'payment' => $user->payment,
            'pickup_place' => $user->pickup_place,
            'selected_seat_no' => $user->selected_seat_no,
            'total_seat' => $user->total_seat,
            'ticket_id' => $user->ticket_id,

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($ticket_id)
    {
        $userDetails = User::where('ticket_id', $ticket_id)->get();

        if ($userDetails->isEmpty()) {
            return response()->json(['message' => 'No user details found for this user_id.'], 404);
        }

        return response()->json([
            'movie_details' => $userDetails,
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
}
