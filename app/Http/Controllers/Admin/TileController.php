<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File;
use App\Tile;
use App\Author;

class TileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiles = Tile::paginate(3);
        return view('admin.tiles.index', ['tiles' => $tiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.tiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
           'name' => 'required',
        ],
            [   'title.required' => 'Введите заголовок',

        ]);
        $tile = Tile::add($request->all());
        return redirect(route('tiles.index'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tile  $tile
     * @return \Illuminate\Http\Response
     */
    public function edit(Tile $tile)
    {
        return view('admin.tiles.edit', compact(
            'tile'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tile  $tile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tile $tile)
    {
        $this->validate($request, [
            'name'	=>	'required',

        ]);
        $tile->update($request->all());

        return redirect(route('tiles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tile  $tile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tile $tile)
    {
        $tile->remove();
        return redirect()->route('tiles.index');
    }
}
