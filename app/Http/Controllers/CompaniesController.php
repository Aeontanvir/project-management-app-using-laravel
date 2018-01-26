<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', 
                    ['companies'=> $companies]
                );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Company $company)
    {
        $company = Company::find($company->id)->first();
        return view('companies.show', 
                    ['company'=> $company]
                );
    }

    public function edit(Company $company)
    {
        $company = Company::find($company->id)->first();
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
        //
    }
}
