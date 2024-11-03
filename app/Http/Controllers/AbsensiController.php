<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{

    public function index()
    {
        $data = Absensi::all();
        return view('absensi.index', compact('data'));
    }
}
