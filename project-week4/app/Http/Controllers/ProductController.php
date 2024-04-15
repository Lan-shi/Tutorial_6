<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{

    public function showProductsWithVariants() {
        $prods = Product::with('variants')->get();

        foreach ($prods as $d) {
            foreach ($d->variants as $var) {
                echo $var->product->name;
            }
        }
    }

    
    
}