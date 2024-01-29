<?php

// app/Http/Controllers/PersonController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    public function index()
    {
        $people = Person::all();
        return view('people.index', compact('people'));
    }

    public function create()
    {
        return view('people.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:people|email',
            'phone_number' => 'required',
            'city' => 'required',
        ]);

        Person::create($validatedData);

        return redirect()->route('people.index')
            ->with('success', 'Person created successfully.');
    }

    public function show(Person $person)
    {
        return view('people.show', compact('person'));
    }

    public function edit(Person $person)
    {
        return view('people.edit', compact('person'));
    }

    public function update(Request $request, Person $person)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:people,email,'.$person->id,
            'phone_number' => 'required',
            'city' => 'required',
        ]);

        $person->update($validatedData);

        return redirect()->route('people.index')
            ->with('success', 'Person updated successfully');
    }

    public function destroy(Person $person)
    {
        $person->delete();

        return redirect()->route('people.index')
            ->with('success', 'Person deleted successfully');
    }
}
