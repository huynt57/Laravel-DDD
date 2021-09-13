<?php


namespace App\Domain\Products\Actions;


use App\Domain\Products\Exceptions\NotFoundProductException;
use App\Domain\Products\Models\Product;
use App\Domain\Products\Repositories\ProductRepository;

/**
 * Class CreateOrUpdateProduct
 * @package App\Domain\Products\Actions
 */
class CreateOrUpdateProduct extends AbstractProductAction
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    /**
     * CreateOrUpdateProduct constructor.
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @param Product $product
     * @return mixed
     */
    public function create(Product $product)
    {
        return $this->productRepository->create($product);
    }

    /**
     * @param Product $product
     */
    public function update(Product $product)
    {
        try {
            return $this->productRepository->update($product);
        } catch (NotFoundProductException $exception) {
            throw new NotFoundProductException($exception->getMessage());
        }
    }
}
