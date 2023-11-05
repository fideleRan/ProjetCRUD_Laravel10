<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Company;
use Illuminate\Http\Request;

use Illuminate\Session\Store;
use function Termwind\render;

class CustomerController extends Controller
{
    //Creer unn cunstructeur middleware
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

   
    //Creer un fonction / methode
    //Fonction/Methode d'affichage liqte des clients
    public function index()
    {
        $customers = Customer::with('company')->get();
        // $companies = Company::all();
        return view('customers.index', compact('customers'));
    }

     // Fonction formulaire pour creer un client
    public function create()
    {
        $this->authorize('create', Customer::class);
        $customers = Customer::all();
        $companies = Company::all();
        
        return view('customers.create', compact('companies', 'customers'));
    }


     // Fonction formulaire pour afficher un client
    public function show(Customer $customer) 
    {
        //$customer =Customer::where('id', $customer)->firstOrFail();
        return view('customers.show', compact('customer'));  
    }

    // Fonction formulaire pour editer un client
    public function edit(Customer $customer)
    {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    // Function mise a jour du client
    public function update(Customer $customer)
    {
    
        $customer->update($this->validator());
        $this->storeProfile($customer);

        $alert = 'Customer updated successfully';
        session()->flash('Message',$alert);
        return redirect('customer/' . $customer->id);
    }

    //Supprimer un client
    public function destroy(Customer $customer)
    {
        $customer->delete();
        $alert='Customer deleted successfully';
        session()->flash('Message',$alert);
        return redirect('customer/');
    }

    //Fonction/Methode d'ajouter un client
    public function store()
    {
        
        $data_customer = Customer::create($this->validator());
        $this->storeProfile($data_customer);

        $alert = 'Customer register successfully';
        session()->flash('Message',$alert);
        //Retourner a la page précedent
        return back();
    }

    //Fonction validateur ders champ input
    private function validator()
    { 
        return request()->validate([
            'name_cust' => 'required|min:3',
            'age' => 'required|integer',
            'email' => 'required|email',
            'status' => 'required',
            'company_id' => 'required|integer',
            'profile_customer' => 'sometimes|image|max:7000'
        ]);
    }

    //Fonction stocker et MAJ le profile du client
    private function storeProfile(Customer $customer)
    {
        if(request('profile_customer')){
            $customer->update([
                'profile_customer' => request('profile_customer')->store('images','public'),
            ]);
        }
    }
}
