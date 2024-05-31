<?php

use App\Http\Controllers\DirectionController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SuiviTempsController;
use App\Http\Controllers\UserControlleur;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\Authenticate;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/login',function(){ return view('login/auth'); })->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/authenticate',[LoginController::class,'authenticate'])->name('authenticate');

 //Route Direction
 Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/direction',[DirectionController::class,'index'])->name('listeDirection');
    Route::get('/direction/create',[DirectionController::class,'create'])->name('ajoutDirection');
    Route::post('/direction',[DirectionController::class,'store'])->name('postDirection');
    Route::get('/direction/{id}',[DirectionController::class,'show'])->name('editDirection');
    Route::put('/direction/{id}',[DirectionController::class,'update'])->name('updateDirection');
    Route::delete('/direction/{id}',[DirectionController::class,'destroy'])->name('deleteDirection');
});

//Route User
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/user',[UserControlleur::class,'index'])->name('listUser');
    Route::get('/user/create',[UserControlleur::class,'create'])->name('ajoutUser');
    Route::post('/user',[UserControlleur::class,'store'])->name('postUser');
    Route::get('/user/{id}',[UserControlleur::class,'show'])->name('editUser');
    Route::put('/user/{id}',[UserControlleur::class,'update'])->name('updateUser');
    Route::delete('/user/{id}',[UserControlleur::class,'destroy'])->name('deleteUser');
});

//Route service
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/service',[ServiceController::class,'index'])->name('listService');
    Route::get('/service/create',[ServiceController::class,'create'])->name('ajoutService');
    Route::post('/service',[ServiceController::class,'store'])->name('postService');
    Route::get('/service/{id}',[ServiceController::class,'show'])->name('editService');
    Route::put('/service/{id}',[ServiceController::class,'update'])->name('updateService');
    Route::delete('/service/{id}',[ServiceController::class,'destroy'])->name('deleteService');
});


Route::middleware([Authenticate::class])->group(function () {

    //Route Dashboard
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/profile',[ProfileController::class,'index'])->name('profile');
    Route::post('/profile',[ProfileController::class,'updateProfile'])->name('updateProfile');
    Route::post('/profile/password',[ProfileController::class,'updateUserPassword'])->name('updateUserPassword');

    Route::middleware(['role:admin|manager'])->group(function(){
        Route::get('/projet/create',[ProjetController::class,'create'])->name('ajoutProjet');
        Route::post('/projet',[ProjetController::class,'store'])->name('postProjet');
        Route::put('/projet/{id}',[ProjetController::class,'update'])->name('updateProjet');
        Route::delete('/projet/{id}',[ProjetController::class,'destroy'])->name('deleteProjet');
    });

    Route::middleware(['role:admin|manager'])->group(function(){
        Route::get('/projet/{id}',[ProjetController::class,'show'])->name('editProjet');
    });

    Route::middleware(['role:admin|manager|secretaire'])->group(function(){
        Route::get('/projet',[ProjetController::class,'index'])->name('listProjet');
    });

    Route::middleware(['role:secretaire'])->group(function(){
        Route::get('/projet/{id}/view',[ProjetController::class,'view'])->name('viewProjet');
    });

    Route::middleware(['role:admin|manager|secretaire'])->group(function(){
        Route::get('/tache/create',[TacheController::class,'create'])->name('ajoutTache');
        Route::post('/tache',[TacheController::class,'store'])->name('postTache');
        Route::post('/suivitemps', [SuiviTempsController::class, 'store'])->name('postSuiviTemps');
        Route::delete('/tache/{id}',[TacheController::class,'destroy'])->name('deleteTache');
        Route::get('/tache/{id}',[TacheController::class,'show'])->name('editTache');
        Route::put('/tache/{id}',[TacheController::class,'update'])->name('updateTache');
    });

    Route::middleware(['role:admin|manager|secretaire|user'])->group(function(){
        Route::get('/tache',[TacheController::class,'search'])->name('listTache');
        Route::get('/tache/{id}/view',[TacheController::class,'view'])->name('viewTache');
        Route::put('/tache/{id}/update',[TacheController::class,'run'])->name('runTache');
        // Route::get('/tache',[TacheController::class,'search'])->name('search');
    });

});


Route::get('/email-form',[MailController::class,'showFormMail'])->name('email.form');
Route::post('/send-email',[MailController::class,'sendEmail'])->name('send.emails');

// routes/web.php


