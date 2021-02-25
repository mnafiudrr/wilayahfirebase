<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wilayah;

class WilayahController extends Controller
{
    public function getKabupaten($kode)
    {
        $kabupatens = Wilayah::whereRaw('LENGTH(kode) = 5')->where('kode','LIKE',$kode.'%')->pluck("nama","kode");
        return json_encode($kabupatens);
    }
    public function getKecamatan($kode)
    {
        $kecamatans = Wilayah::whereRaw('LENGTH(kode) = 8')->where('kode','LIKE',$kode.'%')->pluck("nama","kode");
        return json_encode($kecamatans);
    }
    public function getDesa($kode)
    {
        $desas = Wilayah::whereRaw('LENGTH(kode) = 13')->where('kode','LIKE',$kode.'%')->pluck("nama","kode");
        return json_encode($desas);
    }
}
