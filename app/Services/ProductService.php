<?php
   namespace App\Services;
   use App\Models\Products;

 class ProductService
 {
     public function bestSeller()
     {
         return Products::join('order_details', 'order_details.product_id', 'products.id')
         ->selectRaw('sum(qty) as qty')
         ->groupBy('products.id')
         ->orderBy('qty', 'desc')
         ->limit(3)
         ->addSelect('products.id', 'products.name', 'products.image', 'products.price')
         ->get();
     }

     public function feature($limit = 6 )
   {
       return Products::where('is_feature', true)->limit($limit)->get();
   }

   public function  getByCategoryId($categoryId)
   {
        return Products::join('categorys','products.category_id','categorys.id')
        ->where('products.category_id',$categoryId)
        ->addSelect('products.id','products.name','products.image','products.price')->limit(6)->get();
   }

  public function getBySubCategoryId($subcategoryId)
  {
      return Products::join('sub_categorys','sub_categorys.id','products.subcategory_id')
      ->where('products.subcategory_id',$subcategoryId)
      ->addSelect('products.id','products.name','products.image','products.price')->limit(6)->get();
  }

  public function getByBrandId($brandId)
  {
     return Products::join('brands','brands.id','products.brand_id')
     ->where('products.brand_id',$brandId)
     ->addSelect('products.id','products.name','products.image','products.price')->limit(6)->get();
   }

   public function findById($id)
   {
        return Products::find($id);
   }
 }
