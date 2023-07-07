<?php
namespace App\Repository;

use App\Models\Product;

class AdminRepository implements IAdminRepository{

    public function adminGetAllProducts(){
        return Product::all();
    }
    public function adminDeleteProduct($id){
        return Product::find($id)->delete();
    }
     
}