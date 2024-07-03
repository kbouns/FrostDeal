<?php

namespace App\Service;

use App\Repository\CategorieRepository;

class CategoryService
{
    private $repo;

    public function __construct(CategorieRepository $repo){
        $this->repo = $repo;
    }

    public function get1stLevelCategories()
    {
        return $this->repo->findby(['categories' => null]);
    }
}