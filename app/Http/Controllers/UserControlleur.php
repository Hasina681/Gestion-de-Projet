<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Http\Requests\User\UserPostRequest;
use App\Http\Requests\User\UserPatchRequest;


class UserControlleur extends Controller
{
    public function create()
    {
        $services = Service::all();
        $roles = Role::all()->except(['id' => 4]);
        return view('users.create', compact('services','roles'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::all()->except(['id' => 4]);
        $services = Service::all();
        return view('Users.edit',compact('services','roles', 'user'));
    }
    public function index()
    {
        
        $user = User::all()->except([ 'id' => auth()->user()->id ]);
        return view('users/index', compact('user'));
    }

    public function store(UserPostRequest $request)
    {
        $role = Role::findByName( $request->get('role') );
        $user = User::query()->create([
            'name' => $request->get('nom'),
            'email' => $request->get('email'),
            'service_id' => $request->get('service_id'),
            'password' => Hash::make("123456"),
        ]);
        $profil = new UserProfile([
            'civilite' => $request->get('civilite'),
            'nom' => $request->get('nom'),
            'prenom' => $request->get('prenom'),
            'matricule' => $request->get('matricule'),
            'email' => $request->get('email'),
            'telephone' => $request->get('telephone'),
        ]);
        if($role){
            $user->assignRole($role);
        }
        $profil->user()->associate($user)->save();
        return redirect()->route('listUser')->with([
            'status' => 'success',
            'message' => 'Utilisateur crée'
        ]);
    }

    public function update(UserPatchRequest $request, $id)
    {
        $user = User::find($id);
        $role = Role::findByName( $request->get('role') );
        if( $user ){
            $user->update([
                'service_id' => $request->get('service_id')
            ]);
            if( $user->profile()->count('id') ){
                $user->profile()->update([
                    'civilite' => $request->get('civilite'),
                    'nom' => $request->get('nom'),
                    'prenom' => $request->get('prenom'),
                    'telephone' => $request->get('telephone'),
                ]);
            }else{
                $profil = new UserProfile([
                    'civilite' => $request->get('civilite'),
                    'nom' => $request->get('nom'),
                    'prenom' => $request->get('prenom'),
                    'matricule' => $request->get('matricule'),
                    'email' => $request->get('email'),
                    'telephone' => $request->get('telephone'),
                ]);
                $profil->user()->associate($user)->save();
            }
            if( $role ){
                $user->assignRole($request->get($role));
            }
            return redirect()->route('listUser')->with([
                'status' => 'success',
                'message' => 'Utilisateur mis à jour'
            ]);
        }
        return back()->withErrors([
            'message' => 'Utilisateur introuvable',
        ]);
    }

    public function destroy($id)
    {
        $user= User::find($id);
        if( $user ){
            $user->profile()->delete();
            $user->delete();
            return redirect()->route('listUser')->with([
                'status' => 'success',
                'message' => 'Utilisateur supprimé'
            ]);
        }
        return back()->withErrors([
            'message' => 'Utilisateur inexistant',
        ]);
    } 
}
