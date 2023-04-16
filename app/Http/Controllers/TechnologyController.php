<?php

namespace App\Http\Controllers;

use App\Http\Requests\Technology\StoreTechnologyRequest;
use App\Http\Requests\Technology\UpdateTechnologyRequest;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('technologies.index', [
            'technologies' => $technologies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('technologies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {
        $attributes = $request->validated();

        $attributes['icon'] = Storage::disk('public')->putFile('technologies', $request->file('icon'));
        $attributes['top'] = isset($attributes['top']);

        Technology::create($attributes);

        return redirect('/technologies');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('technologies.show', [
            'technology' => $technology
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('technologies.edit', [
            'technology' => $technology
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $attributes = $request->validated();

        if ($request->file('icon')) {
            Storage::disk('public')->delete($technology->icon);
            $attributes['icon'] = Storage::disk('public')->putFile('technologies', $request->file('icon'));
        }

        $attributes['top'] = isset($attributes['top']);

        $technology->update($attributes);
        return redirect('/technologies');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        Storage::disk('public')->delete($technology->icon);
        $technology->delete();
        return redirect('/technologies');
    }
}
