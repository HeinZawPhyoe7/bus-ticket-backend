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

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
