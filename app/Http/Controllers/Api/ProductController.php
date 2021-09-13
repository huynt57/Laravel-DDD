<?php

namespace App\Http\Controllers\Api;

use App\Domain\Products\Actions\ProductActionInterface;
use App\Domain\Products\DataTransferObjects\ProductBuilder;
use App\Domain\Products\Exceptions\NotFoundProductException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    protected $productAction;
    protected $productBuilder;

    public function __construct(ProductActionInterface $productAction,
                                ProductBuilder $productBuilder
    )
    {
        $this->productBuilder = $productBuilder;
        $this->productAction = $productAction;
    }

    public function create(Request $request)
    {
        return response($this->productAction->create(
            $this->productBuilder->build($request->all())
        ));
    }

    public function update(Request $request)
    {
        try {
            return response($this->productAction->update(
                $this->productBuilder->build($request->all())
            ));
        } catch (NotFoundProductException $exception) {
            return response([
                'status' => 0,
                'message' => $exception->getMessage()
            ]);
        }
    }
}
