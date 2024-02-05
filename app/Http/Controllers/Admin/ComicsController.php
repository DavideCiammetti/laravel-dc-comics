<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        // $data = $request->all();
        $data = $this->validation($request->all());
        $comic = new Comic();

        $comic->fill($data);
        $comic->save();

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic = Comic::findOrFail($id);

        $data = [
            'comic'=> $comic,
        ];
        return view('comicsManagement.showSingleComics', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comic $comic)
    {
        return view('comicsManagement.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        // $data = $request->all();
        $data = $this->validation($request->all());
        $comic->update($data);

       return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index', $comic->id);
    }

    private function validation($data){

        $validator = Validator::make($data,[
            'title'=>'required|max:5',
            'description'=>'required|min:20|max:255',
            'thumb'=>'required',
            'price'=>'required',
            'series'=>'nullable',
            'sale_date'=>'nullable',
            'type'=>'nullable',
            'artists'=>'nullable',
            'writers'=>'nullable'
        ],
        [
            'title.required'=> 'il titolo è obbligatorio',
            'title.max'=> 'massimo 5 caratteri',
            'description.required'=> 'il campo description è obbligatorio',
            'description.min'=> 'minimo 20 caratteri',
            'description.max'=> 'massimo 255 caratteri',
            'thumb.required'=>'campo obbligatorio',
            'price.require'=>'campo obbligatorio',
            'thumb.required'=>'campo obbligatorio',
        ])->validate();
        return $validator;
    }
}
