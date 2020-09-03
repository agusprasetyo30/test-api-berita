<?php
   namespace App\Helpers;
   use Illuminate\Support\Facades\Http;

   class ApiData
   {
      /**
       * Digunakan untuk menampung data API, dan menjadikan menjadi collection
       *
       * @return void
       */
      private function getDataAPI()
      {
         $data_api = collect(Http::get('https://sumedangkab.go.id/berita/apisumedangkab')->json());
         
         return $data_api;
      }

      
      public function getData()
      {
         return $this->getDataAPI();
      }
   }
?>