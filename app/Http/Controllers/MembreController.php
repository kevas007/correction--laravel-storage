<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use App\Http\Requests\StoreMembreRequest;
use App\Http\Requests\UpdateMembreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MembreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view( '')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('pages.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMembreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Membre;

        $store->nom = $request->nom;

        $store->age = $request->age;

        $request->file('image')->storePublicly('img/', 'public');

        $store->image = $request->file('image')->hashName();


        // $genre =  new Genre;
        //  $genre->genre = $request->genre;
        //  $genre->save();
        //  $store->genre_id =  $genre->id;

        $store->genre_id =  $request->genre_id;

        $store->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function show(Membre $membre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Membre::find($id);
        $genres = Genre::all();
        return view('pages.edit', compact('edit','genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMembreRequest  $request
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Membre::find($id);
        $update->nom = $request->nom;
        $update->age = $request->age;

        if ($request->file('image' != null)) {
            Storage::disk('public')->delete('img/' . $update->image);
            $request->file('image')->storePublicly('img/', 'public');

            $update->image = $request->file('image')->hashName();
        }

        $update->genre_id = $request->genre_id;

        $update->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membre  $membre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membre $membre)
    {
        //
    }

}
