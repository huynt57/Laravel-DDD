<?php


namespace App\Domain\Products\Repositories;


use App\Domain\Products\Models\Product;

interface ProductRepositoryInterface
{
    public function create(Product $product);
}
