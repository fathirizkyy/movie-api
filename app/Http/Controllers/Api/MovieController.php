<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $movies = Movie::paginate(5);
        return response()->json($movies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'judul' => 'required|string|max:12',
            'sinopsis' => 'required|string',
            'tahun_rilis' => 'nullable|integer|between:1990,2024',
            'negara' => 'nullable|string|max:255',
        ],[
            'judul.required' => 'Judul harus diisi',
            'judul.max' => 'Judul maksimal 12 karakter',
            'sinopsis.required' => 'Sinopsis harus diisi',
            'tahun_rilis.between' => 'Tahun rilis harus diantara 1990 dan 2024',
            'negara.max' => 'Negara maksimal 255 karakter',
        ]);
        $movie = Movie::create($validatedData);

        return response()->json($movie, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         $movie = Movie::findOrFail($id);
        return response()->json($movie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validatedData = $request->validate([
            'judul' => 'required|string|max:12',
            'sinopsis' => 'required|string',
            'tahun_rilis' => 'nullable|integer|between:1990,2024',
            'negara' => 'nullable|string|max:255',
        ],[
            'judul.required' => 'Judul harus diisi',
            'judul.max' => 'Judul maksimal 12 karakter',
            'sinopsis.required' => 'Sinopsis harus diisi',
            'tahun_rilis.between' => 'Tahun rilis harus diantara 1990 dan 2024',
            'negara.max' => 'Negara maksimal 255 karakter',
        ]);

        $movie = Movie::findOrFail($id);
        $movie->update($validatedData);

        return response()->json($movie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return response()->json(['message' => 'Movie deleted successfully']);
    }
    public function destroyAll()
    {
        Movie::truncate();

        return response()->json(['message' => 'All movies deleted successfully']);
    }
}
