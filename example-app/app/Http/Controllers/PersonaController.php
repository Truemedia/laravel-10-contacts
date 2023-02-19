<?php namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return new Response;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return new Response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        return new Response;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return new Response;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return new Response;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        return new Response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return new Response;
    }
}
