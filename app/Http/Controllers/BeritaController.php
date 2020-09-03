<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ApiData;

class BeritaController extends Controller
{
    /**
     * Fungsi untuk menampikan daftar berita
     *
     * @return void
     */
    public function index(Request $request)
    {
        // Inisialisasi data
        $berita = new ApiData;

        // Untuk menampung pencarian
        $keyword_search = $request->get('q') ? $request->get('q') : '';

        // menampilkan data dan menjadikan dalam bentuk pagination
        $number_pagination = 5;

        // Mengambil data dari fungsi getDataAPI() pada class ApiData
        $get_data_api = $berita->getDataAPI();

        // mengecek apakah pengguna melakukan pencarian atau tidak
        if ($keyword_search != '') {
            
            // Melakukan pencarian berdasarkan judul berita
            $filtered = $get_data_api->filter(function($get_data_api) use ($keyword_search) {
                return false !== stristr($get_data_api['judul'], $keyword_search);
            });

            // melakukan pagination berdasarkan data yang sudah di filter
            $get_data = customPaginate($filtered, $number_pagination);

        } else {
            $get_data = customPaginate($berita->getDataAPI(), $number_pagination);
        }

        // dd($berita->getData());
        return view('berita.index', compact('get_data'));
    }

    /**
     * Fungsi controller untuk mengatur detail berita ketika di tekan
     *
     * @param [type] $slug
     * @return void
     */
    public function detail($slug)
    {
        // Inisialisasi data
        $berita = new ApiData;

        // Mengambil data dari fungsi getDataAPI() pada class ApiData
        $get_data_api = $berita->getDataAPI();
        
        // Melakukan filtering berdasarkan data slug
        $detail_berita = $get_data_api->where('slug', '=', $slug)->first();

        return view('berita.detail', compact('detail_berita'));
    }
}