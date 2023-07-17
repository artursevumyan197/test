<?php

namespace App\Rpository\Product;

interface WriteProductRepositoryInterface
{
  public function save(string $name , int $user_id);
}
