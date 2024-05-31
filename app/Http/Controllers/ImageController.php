<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function show($filename)
    {
        $path = storage_path('app/public'.$filename);
        if(!Storage::exists($path)){
            abort(404);

        }
        return response()->file($path);
    }
}
