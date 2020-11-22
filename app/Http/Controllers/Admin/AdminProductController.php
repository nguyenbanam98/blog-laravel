<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{

    private $product;

    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
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

        $viewData = [
            'products' => $products,
            'categories' => $categories,
        ];
        return view('admin.product.index', $viewData);
    }

    public function create()
    {
        $categories = $this->category->all();
        return view('admin.product.add', compact('categories'));

    }
    public function store(Request $request)
    {
        $this->saveProduct($request);

        return redirect()->back();
    }

    public function edit($id)
    {
        $categories = $this->category->all();

        $product = $this->product->findOrFail($id);

        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->saveProduct($request, $id);

        return redirect()->route('admin.products.index');
    }

    public function saveProduct($request, int $id = null)
    {

        return $this->product->updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'content' => $request->content,
                'title_seo' => $request->title_seo ?? $request->name,
                'description' => $request->description,
                'description_seo' => $request->description_seo,
                'category_id' => $request->category_id,
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
