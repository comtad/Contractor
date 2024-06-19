<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contractor\StoreRequest;
use App\Http\Requests\Contractor\UpdateRequest;
use App\Http\Resources\Contractor\ContractorResource;
use App\Models\Contractor;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Contractors/Index');
    }

    public function getContractors()
    {
        $data = Contractor::query()->select('name', 'inn', 'email')->paginate(10);
        $data = ContractorResource::collection($data);

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Contractor $contractor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contractor $contractor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Contractor $contractor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contractor $contractor)
    {
        //
    }
}
