<?php

namespace App\Rpository\Product;

use Exception;
use App\Models\Product;
use App\Exceptions\FailedSaveProductException;

class WriteProductRepository implements WriteProductRepositoryInterface
{

    /**
     * @throws FailedSaveProductException
     */
    public function save(string $name , int $user_id)
    {
        try {
            $product = new Product();
            $product->name = $name;
            $product->user_id = $user_id;
            $product->save();
        } catch (Exception $e) {
            throw new FailedSaveProductException('Failed to save the product.');
        }

        return $product;
    }
}
