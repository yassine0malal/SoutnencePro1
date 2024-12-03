<?php

namespace App\Http\Controllers;

use App\Models\Solde;
use App\Models\profile;
use App\Mail\gmailvalid;
use App\Models\Formulair;
use App\Mail\gmailrefuser;
use App\Models\Company;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
// use App\Mail\gmailrefuser;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin')->except(['logoutadmin']);
    }

    public function homeAdmin()
{
       return view('admin.homeAdmin');
}

public function soldePost(Request $request){
    if (auth()->check()) {
        $request->validate([
            'companyName' => 'required',
            'solde' => 'required',
        ]);


    if ($request->isMethod('post')) {
        if (auth()->check()) {
        $Solde = new Solde();
        $request->validate([
            'companyName' => 'unique:Soldes',
      ]);
        $Solde->companyName = $request->input('companyName');
        $Solde->solde = $request->input('solde');

        $Solde->save();
        return back()->with('message','Success');
    } else {

        return redirect()->route('register');
    }

}
}
    }



public function solde(Request $request){


return view('admin.solde') ;
}

public function liste_solde(Request $request){

    $solde = Solde::orderBy('created_at', 'desc')->get();
    $com = Company::all();
    // dd($forme,$com,$solde);

    return view('admin.companysolde',compact('solde','com')) ;
    }

    public function edit_solde(Solde $solde){

        return view('admin.edit',compact('solde')) ;
    }

public function update_solde(Request $request , Solde $Solde){
    if (auth()->check()) {
        $request->validate([
            'solde' => 'required',
        ]);



    $currentSolde = $Solde->solde;

    $newSoldeValue = $request->input('solde');
    $Solde->solde = $currentSolde + $newSoldeValue;

    $Solde->save();
    return back()->with('message','Success');
}
}
public function user(Request $request){

    $demande = profile::orderBy('created_at', 'desc')->get();;
    return view('admin.user',compact('demande')) ;
    }
    public function dropuser(Profile $profile){
        $profile->delete();
        return back()->with('message', 'User supprimer avec succès.');
    }

public function demande(Request $request)
{

    $profile=profile::with('Formulair')->get();
    $formule=Formulair::with('profile')->where('is_validated',false)->where('is_refuser',false)->get();
    return view('admin.demande',compact('profile','formule'));
}

    public function logoutadmin()
{
    session()->flush();
    Auth::logout();
    // Redirect to the registration page (if that is your intended behavior)
    return redirect()->route('register');
}
public function Voirdemmande($id){
    $profile=profile::find($id);

    $formule=Formulair::where('profil_id',$id)->where('is_validated',false)->where('is_refuser',false)->get();
    // $so  = new Solde();
    // $forme = Formulair::where('profil_id',$id)->where('is_validated',false)->where('is_refuser',false)->get();
    // $so->companyName = $request->input('company');
    // $so->solde = -$request->input('budget');
    // $so->save();
    return view ('admin.Voirdemmande',compact('profile','formule'));
}

public function arrchive(){
    $profile=profile::with('Formulair')->get();
    $formule=Formulair::with('profile')->get();
    return view('admin.arrchive',compact('profile','formule'));
}


public function valid($id, Solde $solde){

$forme=Formulair::findorfail($id);

$forme->is_validated = true;
$forme->save();
$solde = Company::where('company', $forme->company)->first();
// dd($solde);
if($solde->solde >= $forme->budget){
   $solde->solde -= $forme->budget;
    $solde->save();
}
else
{
    return back()->withErrors(['budget','Solde insuffisant']);
}


$profile = Profile::find($forme->profil_id);
Mail::to($profile->email)->send(new gmailvalid($profile));

return back()->with('message','Demmande Valid');
}

public function refuser($id, Solde $solde){

    $forme=Formulair::findorfail($id);
    $forme->is_refuser = true;

    $forme->save();

    $profile = Profile::find($forme->profil_id);
    Mail::to($profile->email)->send(new gmailrefuser($profile));

    return back()->with('message','Demmande refuser');
    }


}
