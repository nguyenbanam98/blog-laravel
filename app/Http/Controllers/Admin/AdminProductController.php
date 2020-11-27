<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    use StorageImageTrait;

    private $product;

    public function __construct(Product $product, Category $category, Brand $brand)
    {
        $this->product = $product;
        $this->category = $category;
        $this->brand = $brand;

    }

    public function index(Request $request)
    {
        //->with('category:id,name')
        $products = $this->product->latest();
        if ($request->name) {

            $products->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->cate) {
            $products->where('category_id', $request->cate);
        }

        $products = $products->paginate(10);

        $categories = $this->category->all();

        $brands = $this->brand->all();

        $viewData = [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
        ];
        return view('admin.product.index', $viewData);
    }

    public function create()
    {
        $categories = $this->category->all();
        $brands = $this->brand->all();

        return view('admin.product.add', compact('categories', 'brands'));

    }
    public function store(Request $request)
    {

        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        $dataImageProduct = [];

        if (!empty($dataUploadFeatureImage)) {

            $dataImageProduct['img_name'] = $dataUploadFeatureImage['file_name'];
            $dataImageProduct['img_path'] = $dataUploadFeatureImage['file_path'];
        }

        $dataProductCreate = $this->saveProduct($request, null, $dataImageProduct);

        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItem) {
                $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');

                $dataProductCreate->images()->create([
                    'image_path' => $dataProductImageDetail['file_path'],
                    'image_name' => $dataProductImageDetail['file_name'],
                ]);
            }
        }

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $categories = $this->category->all();

        $product = $this->product->findOrFail($id);

        $brands = $this->brand->all();

        return view('admin.product.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, $id)
    {

        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        $dataImageProduct = [];

        if (!empty($dataUploadFeatureImage)) {

            $dataImageProduct['img_name'] = $dataUploadFeatureImage['file_name'];
            $dataImageProduct['img_path'] = $dataUploadFeatureImage['file_path'];
        }

        $dataProductCreate = $this->saveProduct($request, $id, $dataImageProduct);

        $product = $this->product->find($id);

        if ($request->hasFile('image_path')) {

            ProductImage::where('product_id', $id)->delete();

            foreach ($request->image_path as $fileItem) {
                $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');

                $product->images()->create([
                    'image_path' => $dataProductImageDetail['file_path'],
                    'image_name' => $dataProductImageDetail['file_name'],
                ]);
            }
        }

        return redirect()->route('admin.products.index');
    }

    protected function saveProduct($request, int $id = null, $imageName = null)
    {

        return $this->product->updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'content' => $request->content,
                'author_id' => auth()->user()->id,
                'title_seo' => $request->title_seo ?? $request->name,
                'description' => $request->description,
                'description_seo' => $request->description_seo,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'hot' => $request->hot ?? 0,
                'img_name' => $imageName['img_name'],
                'img_path' => $imageName['img_path'],
                'price' => $request->price,
                'sale' => $request->sale,
            ]

        );
    }

    public function action($action, $id)
    {
        if ($action) {

            $product = $this->product->findOrFail($id);
            switch ($action) {
                case 'delete':
                    $product->delete($id);
                    break;
                case 'active':
                    $product->active = $product->active ? 0 : 1;
                    $product->save();
                    break;
                case 'hot':
                    $product->hot = $product->hot ? 0 : 1;
                    $product->save();
                    break;
            }
        }

        return redirect()->back();
    }

}
