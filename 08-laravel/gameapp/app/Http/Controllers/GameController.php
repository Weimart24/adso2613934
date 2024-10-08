<?php

namespace App\Http\Controllers;

use App\Models\Game;
use illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\GameRequest;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::paginate(4);
        return view('games.index')->with('games', $games);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Category::all();
        return view('games.create') -> with('cats', $cats);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GameRequest $request)
    {
        //dd($request->all());

        //Upload file
        if ($request->hasFile('image')) {
            // Almacena el archivo en el sistema de archivos y obtiene solo el nombre hash del archivo.
            $photo = $request->file('image');
            $photoName = $request->file('image')->getClientOriginalName();
            // Almacena el archivo en la ubicación especificada.
            $destinoPath = public_path('/images/gameImage');
            $photo->move($destinoPath, $photoName);
        } else {
            $photoName = 'no-games.jpg';
        }


        $game = new Game;
        $game -> title = $request -> title;
        $game -> image = $photoName;
        $game -> developer = $request -> developer;
        $game -> releasedate = $request -> releasedate;
        $game -> category_id = $request -> category_id;
        $game -> user_id = Auth::user()->id;
        $game -> price = $request -> price;
        $game -> genre = $request -> genre;
        $game -> description = $request -> description;
        $game -> slider = $request -> slider;

        if ($game->save()) {
            return redirect('games')
                ->with('message', 'El juego ' . $game->title . ' ha sido creado con éxito');
        } else {
            return redirect('games')->with('message', 'Ocurrió un error al intentar crear el juego');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('games.show')->with('game', $game);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        $cats = Category::all();
        return view('games.edit')->with('game', $game)->with('cats', $cats);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        if($request->hasFile('image')) {
            $photo = $request->file('image');
            $photoName = $request->file('image')->getClientOriginalName();
            $destinoPath = public_path('/images/gameImage');
            $photo->move($destinoPath, $photoName);
        } else {
            $photoName = $request->originPhoto;
        }

        $game->title = $request->title;
        $game->image = $photoName;
        $game->developer = $request->developer;
        $game->releasedate = $request->releasedate;
        $game->category_id = $request->category_id;
        $game-> user_id  = Auth::user()->id;
        $game->price = $request->price;
        $game->genre = $request->genre;
        $game->description = $request->description;
        $game->slider = $request->slider;

        if($game->save()) {
            return redirect('games')
                ->with('message', 'El Juego ' . $game->title . ' ha sido editado con éxito');
        } else {
            return redirect('games')->with('message', 'Ocurrió un error al intentar editar el Juego');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
