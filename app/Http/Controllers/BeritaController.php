<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiData;

class BeritaController extends Controller
{
    public function index()
    {
        // Inisialisasi data
        $berita = new ApiData;

        // menampilkan data dan menjadikan dalam bentuk pagination
        $number_pagination = 5;
        $get_data = customPaginate($berita->getDataAPI(), $number_pagination);

        // $filtered = $get_data_api->where("idberita", "LIKE", "3292");

        // dd($berita->getData());
        return view('berita.index', compact('get_data'));
    }

    public function detail($slug)
    {
        // Inisialisasi data
        $berita = new ApiData;

        // Mengambil data dari fungsi getDataAPI() pada class ApiData
        $get_data_api = $berita->getDataAPI();
        
        // Melakukan filtering berdasarkan data slug
        $detail_berita = $get_data_api->where('slug', '=', $slug)->first();

        // dd($detail_berita);
        return view('berita.detail', compact('detail_berita'));
    }
}