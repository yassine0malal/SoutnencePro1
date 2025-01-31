<?php

namespace App\Http\Controllers;

use App\Models\Solde;
use App\Models\Company;
use App\Models\Formulair;
use App\Models\profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Session\Session;

class ClientController extends Controller
{
    public function homeClient(profile $profile){
        $user=auth()->user();
        // dd($user);
        $profile=profile::where('id',$user->id)->first();
        return view('client.homeClient',compact('profile'));
}
public function company(){
    return view('client.company');
}
public function liste_company() {

    $companies = Company::all();

    return view('client.company',compact('companies'));
}

public function liste_request() {
    if (auth()->check()) {
        $userId = auth()->id();

        $formulaires = Formulair::where('profil_id', $userId)->where('is_download', false)->where('is_refuser', false)->get();

        return view('client.request', compact('formulaires'));
    } else {
        return redirect()->route('register');
    }
}

public function drop(Formulair $formulair){
    $formulair->delete();
    return back()->with('message', 'Formulaire supprimer avec succès.');
}
public function edit(Formulair $formulair){
    return view('client.edit', compact('formulair'));
}

public function update(Request $request, $id,Company $company) {
    if (auth()->check()) {
        $request->validate([
            'company' => 'required',
            'budget' => 'required|numeric',
            'collaborator' => 'required',
            'destination' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        // Récupérez le solde de l'entreprise sélectionnée
        $companySolde = $company->where('company', $request->input('company'))->value('solde');
        $cmd =Formulair::where('id', $id)->first();
        if ($request->input('budget') <= $companySolde&&!empty($cmd)) {

            $cmd->budget = $request->input('budget');
            $cmd->collaborator = $request->input('collaborator');
            $cmd->destination = $request->input('destination');
            $cmd->date = date("Y-m-d", strtotime($request->input('date')));
            $cmd->description = $request->input('description');
            $cmd->profil_id = auth()->user()->id;
            $cmd->company = $request->input('company');
            $cmd->save();
            return back()->with('message', 'Formulaire mis à jour avec succès.');
        } else {
            return back()->withErrors(['budget' => 'Le budget doit être inférieur au solde disponible.']);
        }
    } else {
        return redirect()->route('register');
    }
}


public function logout()
{
    session()->flush();
    Auth::logout();
    // Redirect to the registration page (if that is your intended behavior)
    return redirect()->route('register');
}


public function tablesolde(Request $request){

    $solde = Company::all();
    return view('client.companysolde',compact('solde')) ;
}

public function contactUs(){
        return view ('client.contactUs');
}

}
