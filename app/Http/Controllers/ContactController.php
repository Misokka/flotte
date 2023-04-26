<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use Illuminate\Http\Request;

// Le contrôleur ContactController étend le contrôleur de base Controller fourni par Laravel
class ContactController extends Controller
{
    // Cette méthode renvoie la vue de formulaire de contact
    public function create()
    {
        return view('contact');
    }

    // Cette méthode traite la soumission du formulaire de contact et envoie un e-mail de confirmation
    public function store(Request $request)
    {
        // Envoyer un e-mail à l'adresse spécifiée avec les données du formulaire, en utilisant la classe Contact et en excluant le jeton CSRF ('_token')
        Mail::to('jeremy.caron.labalette@gmail.com')
            ->send(new Contact($request->except('_token')));

        // Renvoyer la vue de confirmation
        return view('confirm');
    }
}
