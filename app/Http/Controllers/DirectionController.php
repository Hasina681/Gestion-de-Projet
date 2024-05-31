<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Direction;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    public function index()
    {
        $direction =Direction::all();
        return view('Direction.index', compact('direction'));
    }

    public function create()
    {
        return view('direction.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:50',
            'description' => 'max:50' 
        ],
        [
            'nom.required' => 'Ce champ est obligatoire'
        ]);
        Direction::create($request->all());
        return view('Direction.create');
    }

    public function show($id)
    {
        $direction =Direction::find($id);
        return view('Direction.edit')->with('direction',$direction);
    }


    public function update(Request $request, $id)
    {
        $direction = Direction::find($id);
        $direction->update($request->all());
        return redirect()->route('listeDirection');
    }

    public function destroy($id)
    {
        $direction= Direction::find($id);
        $direction->delete();

        return redirect()->route('listeDirection');
    } 
}
