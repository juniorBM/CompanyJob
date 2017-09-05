<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        // $jobs = Job::with('company')->get();
        $jobs = Job::select('jobs.id', 'title', 'description', 'local', 'remote', 'company_id', 'name')
            ->join('companies', 'companies.id', 'jobs.company_id')->get();

        return response()->json($jobs);
    }

    public function show($id)
    {
        $job = Job::with('company')->find($id);

        if(!$job)
        {
            return response()->json([
                'message' => 'Emprego não encontrado',
            ], 404);
        }
        return response()->json($job);
    }

    public function store(Request $request)
    {
        $job = new Job();
        $job->fill($request->all());
        $job->save();

        return response()->json($job, 201);
    }
}
