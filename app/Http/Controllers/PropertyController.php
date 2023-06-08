<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertiesRequest;
use App\Http\Requests\PropertyContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Property;
use App\Mail\PropertyContactMail; // Ajout de l'importation de la classe PropertyContactMail

class PropertyController extends Controller
{

    //Request créer pour le form, ajouter de la sécurité dans l'url (on veut que du numérique)
    public function index(SearchPropertiesRequest $request){
        $query = Property::query()->orderBy('created_at', 'desc');
        if ($price = $request->validated('price')) {
            $query = $query->where('price', '<=', $price);
        }

        if ($surface = $request->validated('surface')) {
            $query = $query->where('surface', '>=', $surface);
        }

        if ($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $rooms);
        }

        if ($title = $request->validated('title')) {
            $query = $query->where('title', 'like', "%{$title}%");
        }

        return view('property.index', [
            'properties' => $query->paginate(9),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property){
        $expectedSlug = $property->getSlug();
        if($slug !== $expectedSlug) {
            return to_route('property.show', ['slug' => $property->getSlug(), 'property' => $property]);
        }

        return view('property.show', [
            'property' => $property
        ]);
    }

    public function contact(Property $property, PropertyContactRequest $request)
    {
        // Les données du formulaire ont déjà été validées à ce stade

        // Envoyer l'e-mail de contact
        Mail::send(new PropertyContactMail($property, $request->validated()));

        // Rediriger l'utilisateur avec un message de succès
        return back()->with('success', 'Votre demande de contact a bien été envoyée');
    }
}
