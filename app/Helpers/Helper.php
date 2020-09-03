<?php
   // Digunakan untuk helpers global

   use Illuminate\Container\Container;
   use Illuminate\Pagination\LengthAwarePaginator;
   use Illuminate\Pagination\Paginator;
   use Illuminate\Support\Collection;

   /**
    * digunakan untuk menampilkan custom paginator sesuai degan data collection
    *
    * @param Collection $results : Data dalam bentuk collection
    * @param [type] $pageSize : Jumlah yang akan ditampilkan
    * @return void
    */
   if (!function_exists('customPaginate')) {
      function customPaginate(Collection $results, $pageSize)
      {
         $page = Paginator::resolveCurrentPage('page');
         
         $total = $results->count();

         return paginator($results->forPage($page, $pageSize), $total, $pageSize, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
         ]);
      }
   }

   /**
    * Buat instance paginator yang baru, ini akan digunakan pada customPaginate
    *
    * @param [type] $items
    * @param [type] $total
    * @param [type] $perPage
    * @param [type] $currentPage
    * @param [type] $options
    * @return void
    */
   if (!function_exists('paginator')) {
      function paginator($items, $total, $perPage, $currentPage, $options)
      {
         return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
            'items', 'total', 'perPage', 'currentPage', 'options'
         ));
      }
   }

   /**
    * untuk mengkonversi bulan
   *
   * @param [type] $nomorBulan
   * @return void
   */
   if (!function_exists('convertBulan')) {
      function convertBulan($nomorBulan) 
      {
         if ($nomorBulan == 1) {
            return 'Januari';
         } else if ($nomorBulan == 2) {
            return 'Pebruari';
         } else if ($nomorBulan == 3) {
            return 'Maret';
         } else if ($nomorBulan == 4) {
            return 'April';
         } else if ($nomorBulan == 5) {
            return 'Mei';
         } else if ($nomorBulan == 6) {
            return 'Juni';
         } else if ($nomorBulan == 7) {
            return 'Juli';
         } else if ($nomorBulan == 8) {
            return 'Agustus';
         } else if ($nomorBulan == 9) {
            return 'September';
         } else if ($nomorBulan == 10) {
            return 'Oktober';
         } else if ($nomorBulan == 11) {
            return 'Nopember';
         } else if ($nomorBulan == 12) {
            return 'Desember';
         }
      }
   }
?>