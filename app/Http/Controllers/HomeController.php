<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve the 6 most recent properties, ordered by their creation date
        $properties = Property::orderBy('created_at', 'desc')->limit(6)->get();

        // Return the 'home' view and pass the properties to the view
        return view('home', ['properties' => $properties]);
    }
}
