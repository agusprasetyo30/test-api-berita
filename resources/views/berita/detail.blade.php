@extends('layout')

@section('title', 'Berita | ' . $detail_berita['judul'])

@section('content')
<main role="main">
   <div class="pt-5">
      <div class="pt-3">
         <div class="container">
            <div class="card">
               <div class="card-body">
                  <h1>
                     {{ $detail_berita['judul'] }}
                  </h1>   
                  <small>
                     {{ date('d', strtotime($detail_berita['tanggal'])) . ' ' . convertBulan(date('m', strtotime($detail_berita['tanggal']))) . ' ' . date('Y', strtotime($detail_berita['tanggal']))}}
                  </small>
                  <hr>

                  <img src="{{ asset('img/no-image.jpg') }}" width="100%" height="450" alt="" srcset="">
                  
                  <div class="mt-3">
                     {!! $detail_berita['isi'] !!}
                  </div>

                  <small>Penulis : {{ $detail_berita['penulis'] }}</small>
               </div>
            </div>
            
         </div>
      </div>
   </div>
</main>
@endsection