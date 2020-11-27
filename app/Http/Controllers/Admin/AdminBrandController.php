<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminBrandController extends Controller
{
    private $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }
    public function index()
    {
        $brands = $this->brand->paginate(10);
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.add');
    }

    public function saveBrand($request, int $id = null)
    {

        return $this->brand->updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
            ]
        );
    }

    public function store(Request $request)
    {

        $this->saveBrand($request);

        return redirect()->back();
    }

    public function edit($id)
    {
        $brand = $this->brand->findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {

        $this->saveBrand($request, $id);

        return redirect()->route('admin.brands.index');
    }

    public function action($action, $id)
    {
        if ($action) {

            $brand = $this->brand->findOrFail($id);
            switch ($action) {
                case 'delete':
                    $brand->delete($id);
                    break;
                case 'active':
                    $brand->active = $brand->active ? 0 : 1;
                    $brand->save();
                    break;
            }
        }

        return redirect()->back();
    }

}
