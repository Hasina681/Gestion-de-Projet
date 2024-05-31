<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuiviTemps;

class SuiviTempsController extends Controller
{
    // app/Http/Controllers/TimeEntryController.php
    public function store(Request $request)
    {
        SuiviTemps::create([
            'tache_id' => $request->input('tache_id'),
            'hours' => $request->input('hours'),
            'description' => $request->input('description'),
        ]);

        return back()->with('success', 'Entrée de temps ajoutée avec succès.');
    }
}


