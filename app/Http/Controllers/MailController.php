<?php

namespace App\Http\Controllers;

use App\Mail\MonMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function showFormMail()
    {
        return view('emails.form');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'nomProjet' => "required|string|max:255",
            'refProjet' => "required|string|max:20",
            'description' => "required|string"
            
        ]);

        $users = User::all();
        foreach($users as $user){
            Mail::to($user->email)->queue(new MonMail(
                $request->nomProjet,
                $request->refProjet,
                $request->description
            ));
        }
        sleep(1);
        return  back()->with('success');
    }
}
