<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{

    public function index()
    {
        //
        return response()->json(['success' => Publisher::all()]);
    }

    public function store(Request $request)
    {
        //
        $publisher= Publisher::create($request->all());
        return response()->json($publisher, 201);
    }


    public function show(Publisher $publisher)
    {
        //
        return response()->json($publisher->load('books'), 200);
    }


    public function update(Request $request, Publisher $publisher)
    {
        //
        $publisher->update($request->all());
        return response()->json($publisher);

    }


    public function destroy(Request $request,Publisher $publisher)
    {
        //
        return response()->json(['success' => $publisher->delete()], 200);
    }
}
