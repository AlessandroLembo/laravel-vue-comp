<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VideogameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videogames = Videogame::all();

        return view('admin.videogames.index', compact('videogames'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $videogame = new Videogame();

        return view('admin.videogames.create', compact('videogame'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');
        $videogame = new Videogame();
        if (Arr::exists($data, 'image')) {
            $img_url = Storage::put('videogames', $data['image']);
            $data['image'] = $img_url;
        }
        $videogame->fill($data);
        $videogame->save();


        return to_route('admin.videogames.show', $videogame->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Videogame $videogame)
    {
        return view('admin.videogames.show', compact('videogame'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videogame $videogame)
    {

        return view('admin.videogames.edit', compact('videogame'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videogame $videogame)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'], '-');
        if (Arr::exists($data, 'image')) {
            if ($videogame->image) Storage::delete($videogame->image);
            $img_url = Storage::put('videogames', $data['image']);
            $data['image'] = $img_url;
        }
        $videogame->update($data);

        return to_route('admin.videogames.show', $videogame->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videogame $videogame)
    {
        if ($videogame->image) Storage::delete($videogame->image);
        $videogame->delete();
        return to_route('admin.videogames.index');
    }
}
