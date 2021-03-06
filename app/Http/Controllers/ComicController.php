<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione
        $request->validate([
            'title' => 'required|unique:comics|max:100',
            'description' => 'required',
            'price' => 'required|numeric',
            'series' => 'required|max:100',
            'sale_date' => 'required|date',
            'type' => 'required|max:100',
        ], [
            'title.required' => 'Il titolo del fumetto è obbligatorio',
            'description.required' => 'La descrizione è obbligatoria',
            'price.required' => 'Il prezzo è obbligatorio',
            'series.required' => 'La serie è obbligatoria',
            'sale_date.required' => 'La data di uscita è obbligatoria',
            'type.required' => 'Il tipo di fumetto è obbligatorio',
            'unique' => ":attribute già esistente",
            'max' => "Il massimo dei caratteri per :attribute è :max",
            'numeric' => ":attribute non è un numero. Inserire un valore valido",
            'date' => ":attribute non è una data valida"
        ]);

        $data = $request->all();
        $comic = new Comic();
        $comic->fill($data);
        $comic->save();

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        // validazione
        $request->validate([
            // per l'aggiornamento dei dati i valori unique devono escludere il 'dettaglio' selezionato altrimenti darà sempre errore, si usa la classe Rule importata sopra  
            'title' => ['required', Rule::unique('comics')->ignore($comic->id), 'max:100'],
            'description' => 'required',
            'price' => 'required|numeric',
            'series' => 'required|max:100',
            'sale_date' => 'required|date',
            'type' => 'required|max:100',
        ], [
            'title.required' => 'Il titolo del fumetto è obbligatorio',
            'description.required' => 'La descrizione è obbligatoria',
            'price.required' => 'Il prezzo è obbligatorio',
            'series.required' => 'La serie è obbligatoria',
            'sale_date.required' => 'La data di uscita è obbligatoria',
            'type.required' => 'Il tipo di fumetto è obbligatorio',
            'unique' => ":attribute già esistente",
            'max' => "Il massimo dei caratteri per :attribute è :max",
            'numeric' => ":attribute non è un numero. Inserire un valore valido",
            'date' => ":attribute non è una data valida"
        ]);

        $data = $request->all();
        $comic->update($data);

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index')->with('delete', $comic->title);
    }

    public function trash()
    {
        $comics = Comic::onlyTrashed()->get();
        return view('comics.trash', compact('comics'));
    }

    public function restore($id)
    {
        $comic = Comic::withTrashed()->find($id);
        $comic->restore();
        return redirect()->route('comics.index');
    }
}
