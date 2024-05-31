<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\User;
use App\Models\tache;

class DashboardController extends Controller
{
    public function index()
    {
        $projets = Projet::count();
        $users = User::count();
        $taches = tache::count();
        return view('dashboard.dashboard', compact(['projets','users', 'taches']));
    }

}
