<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Genre $genre)
    {
		$genres = $genre->orderBy('id', 'asc')->get();
		return view('genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Genre $genre, Request $request)
    {
		$genre->create($request->all());
		return redirect()->route('genre.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
		return view('genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
		return view('genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Genre $genre, Request $request)
    {
        $genre->update($request->all());
        return redirect()->route('genre.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Genre $genre
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws \Exception
	 */
    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genre.index');
    }
}
