<?php
   namespace App\Services;
   use App\Models\SubCategorys;

   class SubCategoryService
   {
       public function findBySubSlug($slug)
       {
          return SubCategorys::where('sub_slug',$slug)->first();
       }
   }

