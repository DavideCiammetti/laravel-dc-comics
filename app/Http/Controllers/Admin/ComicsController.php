<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;

class ComicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comicsManagement.showList', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comicsManagement.createComix');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $comic = new Comic();

        $comic->title = $data['title'];
        $comic->type = $data['type'];
        $comic->description = $data['description'];
        $comic->price = $data['price'];
        $comic->sale_date = $data['sale_date'];
        $comic->thumb  = $data['thumb'];
        $comic->series = $data['series'];
        $comic->artists = $data['artists'];
        $comic->writers  = $data['writers'];

        $comic->save();

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('comicsManagement.showSingleComics', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        // $comics = Comic::findOrFail($id);
        //  dd($comics);
        return view('comicsManagement.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();

        $comic->update($data);

        
        // $comic->title = $data['title'];
        // $comic->type = $data['type'];
        // $comic->description = $data['description'];
        // $comic->price = $data['price'];
        // $comic->sale_date = $data['sale_date'];
        // $comic->thumb  = $data['thumb'];
        // $comic->series = $data['series'];
        // $comic->artists = $data['artists'];
        // $comic->writers  = $data['writers'];

        // $comic->save();
       return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
