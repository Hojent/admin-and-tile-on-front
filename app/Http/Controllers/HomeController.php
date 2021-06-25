<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $tiles = Tile::all()
                  ->take(2)
                  ->sortBy('created_at')
                  ;

        return view('home', [
            'tiles' => $tiles,
        ]);
    }

    // Fetch More Data
    function more_data(Request $request){
        if($request->ajax()){
            $skip=$request->skip;
            $take=2;
            $tiles=Tile::skip($skip)->take($take)->get()->sortBy('created_at');
            return response()->json($tiles);
        }else{
            return response()->json('Direct Access Not Allowed!!');
        }
    }

}
