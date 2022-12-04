<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CategoriesRepositoryInterface;
use App\Models\Categories;
use App\Repositories\Interfaces\CRUDRepositoryInterface;

class CategoriesRepository implements CategoriesRepositoryInterface
{

    public function allCategories()
    {
        return Categories::latest()->paginate(10);
    }

    public function storeCategories($data)
    {
        return Categories::create($data);
    }

    public function findCategories($id)
    {
        return Categories::find($id);
    }

    public function updateCategories($data, $id)
    {
        $Categories = Categories::where('id', $id)->first();
        $Categories->name = $data['name'];
        $Categories->save();
    }

    public function destroyCategories($id)
    {
        $Categories = Categories::find($id);
        $Categories->delete();
    }

    public function getAll(){
        return Categories::all();
    }
}
