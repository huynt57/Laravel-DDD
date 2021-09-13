<?php


namespace App\Domain\Products\DataTransferObjects;


use App\Domain\Products\Models\Product;
use App\Domain\Users\Models\User;

/**
 * Class ProductBuilder
 * @package App\Domain\Products\DataTransferObjects
 */
class ProductBuilder
{
    /**
     * ProductBuilder constructor.
     */
    public function __construct()
    {


    }

    /**
     * @param array $input
     * @return Product
     */
    public function build(array $input)
    {
        $product = new Product();
        $product->setName($input['name']);
        $product->setPrice($input['price']);
        $product->setId($input['id'] ?? null);
        return $product;
    }

}
