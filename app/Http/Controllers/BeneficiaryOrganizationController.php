<?php

namespace App\Http\Controllers;

use App\Models\BeneficiaryOrganization;
use Illuminate\Http\Request;

class BeneficiaryOrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = BeneficiaryOrganization::all();
        return response()->json($organizations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $organization = BeneficiaryOrganization::create($request->all());
        return response()->json($organization, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(BeneficiaryOrganization $organization)
    {
        return response()->json($organization);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BeneficiaryOrganization $organization)
    {
        $organization->update($request->all());
        return response()->json($organization);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BeneficiaryOrganization $organization)
    {
        $organization->delete();
        return response()->json(null, 204);
    }
}
