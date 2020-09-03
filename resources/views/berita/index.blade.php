@extends('layout')

@section('title', 'Daftar Berita Terkini')

@section('content')
<main role="main">
   <div class="pt-5">
      <div class="pt-3">
         <div class="container">
            <div class="card">
               <div class="card-header">
                  <h3 class="card-title d-inline">
                     Daftar Berita
                  </h3>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-4 ml-auto">
                        <div class="input-group">
                           <input type="search" class="form-control" name="search" placeholder="Cari judul berita">
                           <input type="submit" class="btn btn-success" value="Cari">
                        </div>
                     </div>
                  </div>
                  <div class="row mt-4 justify-content-center">
                     @foreach ($get_data as $data)
                        <div class="col-md-11">
                           <div class="media">
                              <img src="{{ asset('img/no-image.jpg') }}" class="align-self-start mr-3" height="110" alt="...">
                              <div class="media-body">
                                 <a href="{{ route('berita.detail', $data['slug']) }}">
                                    {{-- 61 huruf --}}
                                    <h3 class="font-weight-bold">{{ $data['judul'] }}</h3>
                                 </a>
                                 <small>{{ date('d', strtotime($data['tanggal'])) . ' ' . convertBulan(date('m', strtotime($data['tanggal']))) . ' ' . date('Y', strtotime($data['tanggal']))}}</small>
                              </div>
                           </div>
                           <hr>
                        </div>
                     @endforeach
                     {{ $get_data->links() }}
                  </div>
               </div>
            </div>
            
         </div>
      </div>
   </div>
</main>

@endsection