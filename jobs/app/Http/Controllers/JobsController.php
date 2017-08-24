<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Job::with('company')->get();
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
}