<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\ProfileRequest;

use App\Models\User;
use App\Models\Seller;
use App\Models\Settings;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }

    public function update(ProfileRequest $request)
    {
        $user = User::findOrFail($request->user()->id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return redirect()->route('profiles.index')->with('message', 'Profile update successful.');
    }

    public function password()
    {
        $user = Auth::user();
        
        return view('profile.password', compact('user'));
    }

    public function reset(ResetPasswordRequest $request)
    {
        $user = User::findOrFail($request->user()->id);
        
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->route('profiles.password')->withErrors('Your old password do not match on your account.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profiles.password')->with('message', 'Password update successful.');
    }

    public function upgrade()
    {
        $sponsors = User::where('type', 'seller')->where('id', '!=', Auth::id())->get();
        $history = Seller::where('user_id', Auth::id())->where('status', '!=', 'voided')->latest()->get();

        return view('profile.upgrade', [
            'history' => $history, 
            'sponsors' => $sponsors,
        ]);
    }

    public function requestUpgrade(Request $request)
    {
        $user = User::findOrFail($request->user()->id);
        $rates = Settings::firstWhere('id', '>', 0);

        // add username, check in users table if unique
        $seller = new Seller;
        $seller->user_id = $request->user()->id;
        $seller->sponsor_id = $request->sponsor_id;
        $seller->commission = $rates->sponsor_reward ?? 100;
        $seller->status = 'pending';
        $seller->save();
    
        // business logic. move this to a service class
        if ($request->hasFile('payment')) {
            if ($request->file('payment')->isValid()) {
                $fileName = $seller->id . '-' . time() . '.' . $request->payment->extension();
                $request->payment->move(public_path('storage/upgrades'), $fileName);

                $seller->payment = $fileName;
                $seller->save();
            }
        }

        return redirect()->route('profiles.upgrade')
            ->with('message', 'Your request to upgrade your account is set for approval.');
    }
}
