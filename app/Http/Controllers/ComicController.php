<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    protected $validation =  [
        'title' => 'required|max:50',
        'number' => 'required|numeric',
        'price' => 'required|numeric',
        'author' => 'required|max:60',
        'description' => 'nullable|max:255',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::paginate(15);
        $data = [
            'comics' => $comics,
            'title' => 'comics Home'
        ];

        return view("comics.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create', ['title' => 'Create New Comic']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationData = $request->validate($this->validation);

        $data = $request->all();
        $comic = new Comic();
        $comic->fill($data);
        $comic->save();

        return redirect()->route('comics.show', $comic->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comic  $comics
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        $data = [
            'comic' => $comic,
            'title' => $comic->title
        ];
        return view('comics.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comics  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', ['comic'=>$comic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comics  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $validationData = $request->validate($this->validation);

        $data = $request->all();
        $updated = $comic->update($data);
     
        
        return redirect()
        ->route('comics.show', $comic->id)
        ->with('status', "Comic modified");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comics  $comics
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()
            ->route('comics.index')
            ->with('status', "The comic $comic->title is been removed!");
            
    }
}
