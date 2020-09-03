<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiData;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = new ApiData;

        $get_data = $berita->getData();

        $coba = customPaginate($berita->getData(), 5);
        // $filtered = $get_data_api->where("idberita", "LIKE", "3292");

        // dd($get_data_api);
        return view('berita.index', compact('coba'));
    }
}
// 3292