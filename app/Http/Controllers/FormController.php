<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wilayah;

class FormController extends Controller
{
    public function index()
    {
        $provinsis = Wilayah::whereRaw('LENGTH(kode) = 2')->get();
        return view('form', compact('provinsis'));
    }
}
