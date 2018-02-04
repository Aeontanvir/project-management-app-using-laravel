<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CompaniesController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $companies = Company::where('user_id', Auth::user()->id)->get();
            return view('companies.index', 
                        ['companies'=> $companies]
                    );
        }
        return redirect()->route('login');
        
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        if(Auth::check()){
            $company = Company::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'user_id' => Auth::user()->id
            ]);
            if($company){
                return redirect()->route('companies.show', ['company'=> $company->id])
                ->with('success' , 'Company created successfully');
            }
        }
        
        return back()->withInput()->with('errors', 'Error creating new company');
    }

    public function show(Company $company)
    {
        $company = Company::find($company->id);
        return view('companies.show', 
                    ['company'=> $company]
                );
    }

    public function edit(Company $company)
    {
        $company = Company::find($company->id);
        return view('companies.edit', 
                    ['company'=> $company]
        );
    }

    public function update(Request $request, Company $company)
    {
        // update data
        $companyUpdate = Company::where('id', $company->id)
                                    ->update([
                                        'name'=> $request->input('name'),
                                        'description'=> $request->input('description')
                                    ]);
        if($companyUpdate){
            return redirect()->route('companies.show', ['id' => $company->id])
            ->with('success', "Company updated successfully!");
        }
        // redirect data
        return back()->withInput()->with('errors', "Company updated successfully!");

    }

    public function destroy(Company $company)
    {
        $findCompany = Company::find($company->id);
        if($findCompany->delete()) {
            return redirect()->route('companies.index')->with('success', 'Company Deleted successfully');;
        }
        return back()->withInput()->with('errors', "Company could not be deleted!");
    }
}
