<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        
        $user = User::where("id", auth()->user()->id)->first();
        return view('profile.index', compact('user'));
    }

    public function updateUserPassword(Request $request){
        $id = $request->get('id');
        $password = $request->get('password');
        $confirm = $request->get("confirm");
        if( empty($password) || empty( $confirm ) ){
            return redirect("profile")->withErrors('Mot de passe ne peut pas être vide');
        }
        if( $password !== $confirm ){
            return redirect("profile")->withErrors('Les mots de passe doivent être identique');
        }
        $user = User::find($id);
        $user->update([
            'password' => Hash::make($password)
        ]);
        return redirect("profile")->with('Votre mot de passe est à jour');
    }

    public function updateProfile(Request $request){
        $id = $request->get('id');
        $user = User::find($id);
        $user->update([
            'email' => $request->get("email"),
        ]);
        $user->profile()->update([
            'civilite' => $request->get('civilite'),
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'telephone' => $request->get('telephone'),
        ]);
        return redirect("profile")->with('Votre profile est à jour');
    }
}
