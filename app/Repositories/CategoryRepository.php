<?php
namespace App\Repositories;

class CategoryRepository extends EloquentRepository implements CategoryRepositoryInterface {
    public function getModel(){
        return \App\Models\Category::class;
    }

    public function loadCategoryFromFacebook()
    {
        return 'from facebook';
    }
} 