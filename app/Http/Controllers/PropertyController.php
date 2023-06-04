<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertiesRequest;
use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{

    //Request créer pour le form, ajouter de la sécurité dans l'url (on veut que du numérique)
    public function index(SearchPropertiesRequest $request){
        $query = Property::query();
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

    }
}
