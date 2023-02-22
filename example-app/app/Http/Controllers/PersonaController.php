<?php namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\{Contact, Name, Persona};
use App\Http\Requests\PersonaRequest;
use App\Http\Resources\{Persona as PersonaResource, PersonaCollection};

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): PersonaCollection
    {
        // Persona::query()->delete();
        return new PersonaCollection(
            Persona::query()->with('contact', 'names')->get()
        );
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
    public function store(PersonaRequest $request): PersonaResource
    {
        $persona = Persona::make();

        $contact = Contact::make( array_merge(
            $request->only('email'),
            ['phone' => $request->input('telephone')]
        ));
        $names = collect([
            Name::firstName( $request->input('firstName') ),
            Name::lastName( $request->input('lastName') )
        ]);

        $persona = Persona::create();
        $persona->contact()->save($contact);
        $persona->names()->saveMany($names);

        return new PersonaResource($persona);
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
