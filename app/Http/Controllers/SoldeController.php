<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Solde;
use Illuminate\Http\Request;

class SoldeController extends Controller
{
    public function index()
    {
        // $soldes = Solde::all(); // this is the origin one

        $soldes = Company::all();

        return view('layout.solde', compact('soldes')); // this is the origin one
    }

    public function edit ($id)
    {

        $solde = Company::find($id);
        // dd($solde);
        return view('layout.edit',compact('solde'));
    }
    public function update(Request $request, $id)
    {
        $solde = Company::find($id);
        $solde->solde = $solde->solde+$request->solde;

        // dd($solde->solde);
        $solde->save();
        return redirect()->route('solde');
    }
}
