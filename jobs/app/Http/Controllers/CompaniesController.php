<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return response()->json($companies);
    }

    public function show($id)
    {
        $company = Company::find($id);

        if(!$company)
        {
            return response()->json([
                'message' => 'Empresa não encontrada'
            ], 404);
        }
        return response()->json($company);
    }

    public function store(Request $request)
    {

        // $name = $request->input('name');
        // return response()->json(['name' => $name]);

        $company = new Company();
        $company->fill($request->all());
        $company->save();

        return response()->json($company, 201);
    }
}
