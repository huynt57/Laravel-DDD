<?php


namespace App\Domain\Products\Actions;


use App\Domain\Products\Models\Product;

interface ProductActionInterface
{
    public function create(Product $product);
}
