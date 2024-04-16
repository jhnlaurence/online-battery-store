<?php

namespace App\Helpers;

use App\Models\Products;

class ProductChecker
{
    public static function checkStock($productId)
    {
        $product = Products::find($productId);

        if ($product && $product->stock > 0) {
            return true;
        }

        return false;
    }
}
