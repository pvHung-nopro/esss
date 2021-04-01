<?php
   namespace App\Services;
   use App\Models\Categorys;


   class CategoryService
{
    public function all($limit = 10 )
    {
        return Categorys::limit($limit)->get() ;
    }
    public function getSubCategory()
    {
        // return Categorys::join('sub_categorys','categorys.id','=','sub_categorys.category_id')
        // ->select('sub_name','name','slug','sub_slug')
        // ->get();
        return Categorys::with('subcategory')->get();
    }

    public function findBySlug($slug)
    {
         return Categorys::where('slug',$slug)->first();
    }




}
