<?php

namespace App\Http\Controllers;

use App\Http\Requests\Study\StoreStudyRequest;
use App\Http\Requests\Study\UpdateStudyRequest;
use App\Models\Study;
use Illuminate\Support\Facades\Storage;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studies = Study::all();
        return view('study.index', [
            'studies' => $studies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('study.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudyRequest $request)
    {
        $attributes = $request->validated();

        $attributes['logo'] = Storage::disk('public')->putFile('studies', $request->file('logo'));

        $study = Study::create($attributes);
        return redirect('/studies/'.$study->getKey());
    }

    /**
     * Display the specified resource.
     */
    public function show(Study $study)
    {
        return view('study.show', [
            'study' => $study
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Study $study)
    {
        return view('study.edit', [
            'study' => $study
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudyRequest $request, Study $study)
    {
        $attributes = $request->validated();

        if ($request->file('logo')) {
            Storage::disk('public')->delete($study->logo);
            $attributes['logo'] = Storage::disk('public')->putFile('studies', $request->file('logo'));
        }

        $study->update($attributes);
        return redirect('/studies/'.$study->getKey());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Study $study)
    {
        Storage::disk('public')->delete($study->logo);
        $study->delete();
        return redirect('/studies')->with('success', 'Study deleted.');
    }
}
