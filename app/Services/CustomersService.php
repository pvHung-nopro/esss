<?php
   namespace App\Services;
   use App\Models\Customers;

   class CustomersService
   {
       public function save(array $data)
       {
           return Customers::updateOrCreate([
               'phone'=> $data['phone']
           ],
           [
               'name'    => $data['name'],
               'email'   => $data['email'],
               'address' => $data['address'],
           ]);
       }
   }


