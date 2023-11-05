<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // __Construct Midelware
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }
    public function index()
    {
        //Stocker dans un variable les modeles de requetes company
        $companies = Company::all(); 
        //Rertourner dans un view cette requette
        return view('companies.index', [
            'companies' => $companies
        ]);
    }

    //CREATE
    public function create(){
        $company = Company::all();
        $companies =Company::all();
        return view('companies.create', compact('companies'));
    }

    //SHOW
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    //EDIT
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    //UPDATE
    public function update(Company $company)
    {
        $company->update($this->validator());
        $this->storeImage($company);
        
        $alert = 'Company updated successfully';
        session()->flash('Message',$alert);
        return redirect('company/'.$company->id);
    }

    //DELETE
    public function destroy(Company $company)
    {
        $company->delete();
        $alert = 'Company deleted successfully';
        session()->flash('Message',$alert);
        return redirect('company/');
    }

    public function store()
    {
        // Requete d'ajout 
        $create_comapny = Company::create($this->validator());
        $this->storeImage($create_comapny);

        $alert = 'Company added successfully';
        session()->flash('Message',$alert);
        // Retour à la pagr precedent
        return redirect('company/');
    }

    private function validator(){
        return  request()->validate([ 
            'name_company' => 'required|min:3',
            'image_company' => 'sometimes|image|max:7000'
        ]);
    }

    private function storeImage(Company $comapny)
    {
        if(request('image_company')){
            $comapny->update([
                'image_company' => request('image_company')->store('imagesCompany','public')
            ]);
        }
    }
}
