<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tile;


class DashboardController extends Controller
{
    public function index()
    {
        $lasttiles = Tile::orderBy('created_at','desc')->take(2)->get();
        return view('admin.dashboard' , compact('lasttiles'));
    }
}
