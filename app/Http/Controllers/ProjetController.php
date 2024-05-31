<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Direction;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function index()
    {
        $direction=Direction::all();
        $projets =Projet::all();
        return view('Projet.index', compact('projets' ,'direction'));
    }

    public function store(Request $request)
    {
        $projet = Projet::create($request->all());
        $direction = Direction::all();
        return view('Projet.create',compact('projet','direction'));
    }
    
    public function create()
    {
        $direction = Direction::all();
        return view('Projet.create', compact('direction'));
    }
    public function show($id)
    {
        $projet = Projet::find($id);
        $directions=Direction::all();
        return  view('Projet.edit', compact(['directions', 'projet']));
    }


    public function update(Request $request, $id)
    {
        $projet = Projet::find($id);
        $projet->update($request->all());
        return redirect()->route('listProjet');
    }

    public function destroy($id)
    {
        $projet = Projet::find($id);
        $projet->delete();

        return redirect()->route('listProjet');
    } 

    public function view($id){
        $projet = Projet::findOrFail($id);
        return view('projet.view',  compact('projet'));
    }

}
