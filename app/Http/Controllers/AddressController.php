<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddressRequest;

use App\Models\Address;

class AddressController extends Controller
{
    public function index()
    {
        $address = Address::where('user_id', Auth::id())->first();

        return view('profile.address', compact('address'));
    }

    public function store(AddressRequest $request)
    {
        $address = Address::updateOrCreate(
            ['user_id' => $request->user()->id, 'type' => 'shipping'],
            [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address_line1' => $request->address_line1,
                'address_line2' => $request->address_line2,
                'province' => $request->province,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'landmark' => $request->landmark,
            ],
        );

        return redirect()->route('addresses.index')
            ->with('message', 'Shipping address successfully edited.');
    }
}
