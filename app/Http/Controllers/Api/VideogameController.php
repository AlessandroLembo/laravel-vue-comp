<?php

namespace App\Http\Controllers\Api;

use App\Models\Videogame;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videogames = Videogame::get();

        foreach ($videogames as $videogame) {
            if ($videogame->image) $videogame->image = url('storage/' . $videogame->image);
        }

        return response()->json($videogames);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $videogame = Videogame::where('slug', $slug)->first();
        if (!$videogame) return response('null', 404);
        if ($videogame->image) $videogame->image = url('storage/' . $videogame->image);
        return response()->json($videogame);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
