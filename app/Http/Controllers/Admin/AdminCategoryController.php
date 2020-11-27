<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index()
    {
        $categories = $this->category->select('id', 'name', 'title_seo', 'active')->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.add');
    }

    public function saveCategory($request, int $id = null)
    {

        return $this->category->updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'name' => $request->category,
                'slug' => Str::slug($request->category),
                'icon' => Str::slug($request->icon),
                'title_seo' => $request->title_seo ?? $request->category,
                'description' => $request->description,
            ]
        );
    }

    public function store(Request $request)
    {

        $this->saveCategory($request);

        return redirect()->back();
    }

    public function edit($id)
    {
        $category = $this->category->findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {

        $this->saveCategory($request, $id);

        return redirect()->route('admin.categories.index');
    }

    public function action($action, $id)
    {
        if ($action) {

            $category = $this->category->findOrFail($id);
            switch ($action) {
                case 'delete':
                    $category->delete($id);
                    break;
                case 'active':
                    $category->active = $category->active ? 0 : 1;
                    $category->save();
                    break;
            }
        }

        return redirect()->back();
    }

}
