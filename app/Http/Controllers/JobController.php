<?php

namespace App\Http\Controllers;

use App\Http\Requests\Job\StoreJobRequest;
use App\Http\Requests\Job\UpdateJobRequest;
use App\Models\Job;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all();
        return view('job.index', [
            'jobs' => $jobs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $attributes = $request->validated();

        $attributes['logo'] = Storage::disk('public')->putFile('jobs', $request->file('logo'));

        $job = Job::create($attributes);
        return redirect('/jobs/'.$job->getKey());
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        return view('job.show', [
            'job' => $job
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        return view('job.edit', [
            'job' => $job
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        $attributes = $request->validated();

        if ($request->file('logo')) {
            Storage::disk('public')->delete($job->logo);
            $attributes['logo'] = Storage::disk('public')->putFile('jobs', $request->file('logo'));
        }

        $job->update($attributes);
        return redirect('/jobs/'.$job->getKey());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        Storage::disk('public')->delete($job->logo);
        $job->delete();
        return redirect('/jobs')->with('success', 'Job deleted.');
    }
}
