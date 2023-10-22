<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     ** @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view("comics.index", compact("comics"));
    }

    /**
     * Show the form for creating a new resource.
     *
     ** @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("comics.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * *@return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $comic = new Comic();
        $comic->fill($data);
        $comic->save();

        return redirect()->route('comics.show', $comic)
            //! QUI VOGLIAMO DARE ALL'ALERT CHE COMPARIRA' IL COLORE VERDE DEL success
            // ! E IL MESSAGGIO 'Comic creato con successo'
            ->with('message_type', 'success')
            ->with('message', 'Comic creato con successo');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view("comics.show", compact("comic"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view("comics.edit", compact("comic"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * *@return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        $comic->update($data);
        return redirect()->route('comics.show', $comic)

            //! QUI VOGLIAMO DARE ALL'ALERT CHE COMPARIRA' IL COLORE BLU DELL'INFO 
            // ! E IL MESSAGGIO 'Comic modificato con successo'
            ->with('message_type', 'info')
            ->with('message', 'Comic modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()
            ->route('comics.index')
            // ! QUESTI MESSAGGI FLASH SONO VARIABILI DI SESSIONE CHE DURANO IL
            // ! TEMPO DI UN CARICAMENTO POI SCOMPAIONO
            // ! STIAMO RENDENDO DINAMICA LA CLASSE CON LA VARIABILE
            // ! message_type(NOME SCELTO DA NOI) E DANDO DOPO LA VIRGOLA LA CLASSE
            // ! DESIDERATA CHE VOGLIAMO DARE ALL'ALERT CHE COMPARIRA' IN QUESTO CASO
            // ! ROSSO QUINDI DANGER

            ->with('message_type', 'danger')
            ->with('message', 'Comic eliminato con successo');
    }
}