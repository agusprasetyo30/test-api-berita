<?php
   // Digunakan untuk helpers global

   use Illuminate\Container\Container;
   use Illuminate\Pagination\LengthAwarePaginator;
   use Illuminate\Pagination\Paginator;
   use Illuminate\Support\Collection;

   function customPaginate(Collection $results, $pageSize)
   {
      $page = Paginator::resolveCurrentPage('page');
      
      $total = $results->count();

      return paginator($results->forPage($page, $pageSize), $total, $pageSize, $page, [
         'path' => Paginator::resolveCurrentPath(),
         'pageName' => 'page',
      ]);

   }

   function paginator($items, $total, $perPage, $currentPage, $options)
   {
      return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
         'items', 'total', 'perPage', 'currentPage', 'options'
      ));
   }
?>