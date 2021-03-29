<?php

namespace App\Http\Controllers;

use App\Lead;
use App\Mail\SendNewMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.home');
    }

    public function contatti(){
        return view('guest.contatti');
    }

    public function contattiSent(Request $request){
        $data = $request->all();
        $newLead = new Lead();
        $newLead->fill($data);

        Mail::to('info@boolpress.com')->send(new SendNewMail ($newLead));
        $newLead->save();
        return redirect()->route('guest.contatti')->with('verifica', 'Messaggio inviato!');
    }
}
