<?php
namespace App\Repositories\Interfaces;

Interface CategoriesRepositoryInterface{

    public function allCategories();
    public function storeCategories($data);
    public function findCategories($id);
    public function updateCategories($data, $id);
    public function destroyCategories($id);
    public function getAll();
}
