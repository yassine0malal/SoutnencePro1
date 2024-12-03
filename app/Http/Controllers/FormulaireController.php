<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Solde;
use App\Models\Formulair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FormulaireController extends Controller
{
    public function formulePost(Request $request, Company $solde){
        if ($request->isMethod('post')) {
            if (auth()->check()) {
                $request->validate([
                    'company' => 'required',
                    'budget' => 'required|numeric',
                    'collaborator' => 'required',
                    'Destination' => 'required',
                    'description' => 'required',
                    'date' => 'required|date',  // Supposant que la date est un champ requis
                ]);

                // Récupérez le solde de l'entreprise sélectionnée

                $companySolde = $solde->where('company', $request->input('company'))->value('solde');
                // dd($companySolde);
                // $sold = Company::all();

                // $budget = Solde::all();
               /***works  $money = new Solde();
                $money->companyName = $request->input('company');

                */if($request->input('budget') <= $companySolde){

               /* $money->solde = -$request->input('budget');
                $money->save();
                // dd($money);
                $comm=  Company::all();
                foreach($comm as $com)
                {
                    if($com->solde == $companySolde)
                    {
                        // dd($com->company);
                        $com->solde = $com->solde - $request->input('budget');
                        $com->save();
                    }
                }*/
// dd($comm);
                // $comm->company = $request->input('company');
                // $comm->solde = $companySolde - $request->input('budget');
                // $comm->social_reason= $request->input('social_reason');
                // $comm->reference= $request->input('reference');
                // $comm->founded_out= $request->input('founded_out');
                // dd($comm);
                }
            else
            return back()->withErrors(['budget','Budget supérieur au solde']);
                // $money->save();

                //  $societe =$request->input('company');
                //  foreach($budget as $budg)
                //  {
                //     if($budg->companyName == $request->input('company'));
                //     {
                //         $budg->solde == $budg->solde - $request->input('budget');
                //         $budget->save();
                //         dump($budg->solde);
                //     }

                //  }

                if ($request->input('budget') <= $companySolde)
                {
                    $formulaire = new Formulair();
                    $formulaire->company = $request->input('company');
                    $formulaire->budget = $request->input('budget');
                    $formulaire->collaborator = $request->input('collaborator');
                    $formulaire->Destination = $request->input('Destination');
                    $formulaire->date = date("Y-m-d", strtotime($request->input('date')));
                    $formulaire->description = $request->input('description');
                    $formulaire->profil_id = auth()->user()->id;
                    $so  = new Solde();
                    $so->companyName = $request->input('company');
                    $so->solde = -$request->input('budget');
                    $so->save();

                    // dd($formulaire);
                    $formulaire->save();
                    return back()->with('message', 'Succès');
                } else {
                    return back()->withErrors(['budget' => 'Le budget doit être inférieur au solde disponible.']);
                }
            } else {
                return redirect()->route('register');
            }
        }
    }




   public function formule(Request $request){

    return view('client.formulaire') ;
   }

}
