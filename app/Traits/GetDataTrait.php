<?php
namespace App\Traits;

use App\Brand;
use App\Category;

trait GetDataTrait
{
    public function getDataView()
    {
        $categories = Category::select('id', 'name', 'description')->where('active', 1)->latest()->get();

        $brands = Brand::select('id', 'name', 'description')->where('active', 1)->latest()->get();

        return [
            'categories' => $categories,
            'brands' => $brands,
        ];
    }
}
