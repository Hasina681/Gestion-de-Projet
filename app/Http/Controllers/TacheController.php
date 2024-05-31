<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Projet;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if( $user->hasRole('user') ){
            $tache = Tache::where('user_id', '=', $user->id)->orderBy('id', 'desc')->get();
        }else{
            $tache =Tache::orderBy('id','desc')->get();
        }
        return view('Tache.index', compact('tache'));
    }
    public function search(Request $request)
    {
            $query = Tache::query();
            if($request->has('search'))
            {
                    $search = $request->input('search');
                    $query->where('nom','like',"%{$search}%");
                    //  ->orWhere('content','like',"%{$search}%");
            }
    
            $tache = $query->get();    
        
        return view('Tache.index',compact('tache'));
    }
    public function store(Request $request)
    {
        Tache::create($request->all());
        return redirect()->route('listTache');
    }
    public function create()
    {
        $projet= Projet::all();
        $user= User::role('user')->get();
        return view('Tache/create', compact(['projet', 'user']));
    }
    public function show($id)
    {
        $tache=Tache::find($id);
        $projet= Projet::all();
        $user= User::role('user')->get();
        return view('Tache.edit',  compact(['projet', 'user', 'tache']));
    }


    public function update(Request $request, $id)
    {
        $tache = Tache::find($id);
        $tache->update($request->all());
        return redirect()->route('listTache');
    }

    public function destroy($id)
    {
        $tache=Tache::find($id);
        $tache->delete();

        return redirect()->route('listTache');
    } 

    public function view($id){
        $tache = Tache::findOrFail($id);
        $projet = $tache->projet()->first();
        $etats = ['Non entamé', 'En cours', 'En atente'];
        return view('tache.view',  compact('projet','tache', 'etats'));
    }

    public function run(Request $request, $id){
        $tache = Tache::findOrFail($id);
        $etat = $request->get('etat');
        if( $tache ){
            if( $etat === 'Non entamé' && $tache->date_debut !== null ){
                return back()->withErrors([
                    'message' => 'La tâche est déjà entamé',
                ]);
            }
            if( $etat !== 'Non entamé' && $tache->date_debut === null ){
                $tache->update([
                    'etat' => $etat,
                    'date_debut' => now()
                ]);
            }else{
                $tache->update([
                    'etat' => $etat,
                ]);
            }
            return redirect()->route('listTache');
        }
        return back()->withErrors([
            'message' => 'Tâche inexistante',
        ]);
    }
    


}
