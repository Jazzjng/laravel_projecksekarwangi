<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WbsSystem;

class wbsSystem extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $daftar_wbs = WbsSystem::all();
        return view('wbs_system', ['daftar_wbs'=>$daftar_wbs]);

    }
}
