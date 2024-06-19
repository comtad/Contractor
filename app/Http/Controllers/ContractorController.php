<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contractor\StoreRequest;
use App\Http\Requests\Contractor\UpdateRequest;
use App\Http\Resources\Contractor\ContractorResource;
use App\Models\Contractor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Inertia\Inertia;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Contractor::query()->select('id', 'name', 'inn', 'email')->get();
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

        $data = $request->validated();

        Contractor::create($data);

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Contractor::query()->where('id', $id)->select('id', 'name', 'inn', 'email')->get();
        $data = ContractorResource::collection($data)->resolve();

        return $data;
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
        $data = $request->validated();
        $contractor->update($data);

        return response()->json('success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contractor $contractor)
    {
        $contractor->delete();

        $data = Contractor::query()->select('id', 'name', 'inn', 'email')->get();
        $data = ContractorResource::collection($data);

        return $data;
    }

    public function getContractorsView()
    {
        return Inertia::render('Contractor/Index');
    }

    public function getCreateForm()
    {

        $create_url = URL::route('contractors.store');

        return Inertia::render('Contractor/Create', compact('create_url'));
    }

    public function getEditForm(string $id)
    {

        $edit_url = URL::route('contractors.show', $id);

        return Inertia::render('Contractor/Edit', compact('edit_url', ));
    }
}
