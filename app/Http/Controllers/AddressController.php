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
        $addresses = Address::where('user_id', Auth::id())->get();

        return view('profile.address', compact('addresses'));
    }

    public function store(AddressRequest $request)
    {
        $address = new Address;
        $address->user_id = $request->user()->id;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->address_line1 = $request->address_line1;
        $address->address_line2 = $request->address_line2;
        $address->province = $request->province;
        $address->city = $request->city;
        $address->postal_code = $request->postal_code;
        $address->landmark = $request->landmark;
        $address->save();

        return redirect()->route('addresses.index')
            ->with('message', 'Shipping address successfully added.');
    }

    public function show($id)
    {
        $address = Address::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        return view('profile.show_address', compact('address'));
    }

    public function update(AddressRequest $request)
    {
        $address = Address::where('id', $request->id)->where('user_id', $request->user()->id)->firstOrFail();
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->address_line1 = $request->address_line1;
        $address->address_line2 = $request->address_line2;
        $address->province = $request->province;
        $address->city = $request->city;
        $address->postal_code = $request->postal_code;
        $address->landmark = $request->landmark;
        $address->is_default = $request->is_default;
        $address->save();

        if ($request->is_default == 1) {
            Address::where('id', '!=', $request->id)->where('user_id', $request->user()->id)
                ->update(['is_default' => 0]);
        }

        return redirect()->route('addresses.show', ['id' => $request->id])
            ->with('message', 'Shipping address successfully edited.');
    }

    public function destroy(Request $request)
    {
        $address = Address::where('id', $request->id)->where('user_id', Auth::id())->firstOrFail();
        $address->delete();

         return redirect()->route('addresses.index')
            ->with('message', 'Shipping address successfully deleted.');
    }
}
