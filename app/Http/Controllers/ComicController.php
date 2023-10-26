<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

// # IMPORTO IL VALIDATOR 
use Illuminate\Support\Facades\Validator;

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
        // # SENZA VALIDAZIONE
        // $data = $request->all();
        // # CON VALIDAZIONE
        $data = $this->validation($request->all());
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
        // # SENZA VALIDAZIONE
        // $data = $request->all();

        // # CON VALIDAZIONE
        $data = $this->validation($request->all(), $comic->id);
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

    private function validation($data)
    {
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|string|max:20',
                "description" => "required|string",
                "thumb" => "required|string",
                "price" => "required|string",
                "series" => "required|string",
                "sale_date" => "required|date",
                "type" => "required|string"

            ],
            [
                'title.required' => 'Il titolo è obbligatorio',
                'title.string' => 'Il titolo deve essere una stringa',
                'title.max' => 'Il titolo deve massimo di 20 caratteri',

                'description.required' => 'La descrizione è obbligatorio',
                'description.string' => 'La descrizione deve essere una stringa',

                'thumb.required' => 'La thumbnail è obbligatorio',
                'thumb.string' => 'La thumbnail deve essere una stringa',

                'price.required' => 'Il prezzo è obbligatorio',
                'price.string' => 'Il prezzo deve essere una stringa',

                'series.required' => 'La serie è obbligatorio',
                'series.string' => 'La serie deve essere una stringa',

                'sale_date.required' => 'La data di vendita è obbligatorio',
                'sale_date.date' => 'La data di vendita deve essere una data',

                'type.required' => 'Il tipo è obbligatorio',
                'type.string' => 'Il tipo deve essere una stringa',
            ]
        )->validate();

        return $validator;
    }
}

