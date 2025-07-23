<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nom', 'like', "%$search%")
                  ->orWhere('telephone', 'like', "%$search%");
        }

        $contacts = $query->latest()->paginate(10);

        return view('contacts.index', compact('contacts'));
    }

   
    public function create()
    {
        return view('contacts.create');
    }

   
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:contacts',
            'telephone' => 'required',
            'adresse' => 'required',
            'photo_profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        
        if ($request->hasFile('photo_profile')) {
            $file = $request->file('photo_profile');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $data['photo_profile'] = $fileName;
        }

        Contact::create($data);

        return redirect()->route('contacts.index')->with('success', 'Contact ajouté avec succès');
    }

    
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

   
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'telephone' => 'required',
            'adresse' => 'required',
            'photo_profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        
        if ($request->hasFile('photo_profile')) {
            $file = $request->file('photo_profile');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $data['photo_profile'] = $fileName;
        }

        $contact->update($data);

        return redirect()->route('contacts.index')->with('success', 'Contact modifié avec succès');
    }

   
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact supprimé avec succès');
    }
}
