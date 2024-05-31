<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Direction;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $direction = Direction::all();
        $service = Service::all();
        return view('Service.index', compact('service', 'direction'));
    }

    public function store(Request $request)
    {
        $service = Service::create($request->all());
        $direction = Direction::all();
        return view('Service.create', compact('service', 'direction'));
    } 
    
    public function create()
    {
        $direction = Direction::all();
        return view('service.create', compact('direction'));
    }

    public function show($id)
    {
        $service = Service::find($id);
        $direction = Direction::all();
        return view('Service.edit', compact('service', 'direction'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $service->update($request->all());
        return redirect()->route('listService');
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        return redirect()->route('listService');
    } 
}
