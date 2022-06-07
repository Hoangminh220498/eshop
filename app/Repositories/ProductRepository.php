<?php
namespace App\Repositories;

class ProductRepository extends EloquentRepository implements ProductRepositoryInterface{
    public function getModel(){
        return \App\Models\Product::class;
    }
} 