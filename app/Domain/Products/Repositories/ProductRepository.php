<?php


namespace App\Domain\Products\Repositories;


use App\Domain\Products\Exceptions\NotFoundProductException;
use App\Models\Product;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @param \App\Domain\Products\Models\Product $product
     * @return mixed
     */
    public function create(\App\Domain\Products\Models\Product $product)
    {
        return Product::query()->create([
            'name' => $product->getName(),
            'price' => $product->getPrice()
        ]);
    }

    public function update(\App\Domain\Products\Models\Product $product)
    {
        if (empty($product->getId())) {
            throw new NotFoundProductException('Không tìm thấy sản phẩm');
        }
        $product = Product::find($product->getId());
        if (!$product) {
            throw new NotFoundProductException('Không tìm thấy sản phẩm');
        }
        return Product::query()->where('id', $product->getId())->update([
            'name' => $product->getName(),
            'price' => $product->getPrice()
        ]);
    }
}
