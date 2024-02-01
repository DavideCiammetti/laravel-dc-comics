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
        return view('comics_management.showList', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics_management.createComix');
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

        return redirect()->route('comics_management.show', $comic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    // public function show(Comic $comic)
    {
        $comic = Comic::find($id);

        return view('comics_management.showSingleComics', compact('comic'));
    }



















    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
