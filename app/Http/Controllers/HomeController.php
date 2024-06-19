<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home', ['users' => $user]);
    }

    public function updatePass(Request $request) 
    {
        $validated = $request->validate([
            'oldPass' => 'required',
            'newPass' => 'min:8|required|confirmed',

        ]);

        $id = Auth::id();
        $user = User::findOrFail($id);
        if (Hash::check($validated['oldPass'], $user->password)) {

            $validated['newPass'] = Hash::make($validated['newPass']);

            $user->update([
                'password' => $validated['newPass'],
            ]);

            return redirect()->route('MyProfile')->with('success', 'Password has been changed successfully');
        } else {
            return redirect()->route('MyProfile')->with('fail', 'Password has not been changed successfully');
        }

    }

    public function deleteAccount() 
    {
        $user = Auth::user();
        User::whereIn('id', $user)->delete();
        return redirect('/');
    }

    public function changePFP(Request $request) 
    {
        $validated = $request->validate([
            'pfp' => 'image|required'
        ]);

        $user = Auth::user();
        $validated = User::findOrFail($user->id);

        if(request()->has('pfp')) 
        {
            $imagePath = request()->file('pfp')->store('profile','public');

            if($user->pfp != null)
            {
                Storage::disk('public')->delete($user->pfp);
            }
        }
        $validated->update(['pfp' => $imagePath]);
        return redirect() -> route("MyProfile") -> with('success', 'Profile data successfully updated');
    }

    public function changeName(Request $request) 
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'name' => 'required',
        ]);

        $user = Auth::user();
        $validated = User::findOrFail($user->id);
        $validated->update($request->all());

        return redirect() -> route("MyProfile") -> with('success', 'Profile data successfully updated');

    }

}
