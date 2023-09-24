<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\UserAdress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.dashboard.address.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.dashboard.address.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'max:200', 'email'],
            'phone' => ['required', 'max:200',],
            'country' => ['required', 'max:200'],
            'stats' => ['required', 'max:200'],
            'city' => ['required', 'max:200'],
            'zip_code' => ['required', 'max:200'],
            'address' => ['required'],
        ]);
        $userAddress = new UserAdress();

        $userAddress->user_id = Auth::user()->id;
        $userAddress->name = $request->name;
        $userAddress->email = $request->email;
        $userAddress->phone = $request->phone;
        $userAddress->country = $request->country;
        $userAddress->stats = $request->stats;
        $userAddress->city = $request->city;
        $userAddress->zip_code = $request->zip_code;
        $userAddress->address = $request->address;
        $userAddress->save();
        toastr('Adress Created Successfully', 'success', 'success');
        return redirect()->route('user.address.index');
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
