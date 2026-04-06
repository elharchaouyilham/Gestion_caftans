<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Product::with('category');
        $categories = Category::all();

        if ($request->has('category') && $request->category !== '') {
            $query->where('category_id', $request->category);
        }

        if ($request->has('search') && $request->search !== '') {
            $search = $request->search;
            $query->where('nom', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        }

        $products = $query->paginate(15);

        return view('admin.catalog.index', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $request->input('category', ''),
            'searchQuery' => $request->input('search', '')
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.catalog.create', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'quantite' => 'required|integer|min:1',
            'prix' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'url' => 'nullable|url',
            'description' => 'nullable|string',
            'style' => 'nullable|string',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
            'ceremony_type' => 'nullable|string'
        ]);

        $validated['user_id'] = auth()->id();

        Product::create($validated);

        return redirect()->route('admin.catalog.index')
            ->with('success', 'Produit créé avec succès!');
    }

    public function edit(Product $catalog)
    {
        $categories = Category::all();

        return view('admin.catalog.edit', [
            'product' => $catalog,
            'categories' => $categories
        ]);
    }

    
    public function update(Request $request, Product $catalog)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'quantite' => 'required|integer|min:1',
            'prix' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'url' => 'nullable|url',
            'description' => 'nullable|string',
            'style' => 'nullable|string',
            'color' => 'nullable|string',
            'size' => 'nullable|string',
            'ceremony_type' => 'nullable|string'
        ]);

        $catalog->update($validated);

        return redirect()->route('admin.catalog.index')
            ->with('success', 'Produit mis à jour avec succès!');
    }

    public function destroy(Product $catalog)
    {
        $catalog->delete();

        return redirect()->route('admin.catalog.index')
            ->with('success', 'Produit supprimé avec succès!');
    }

    public function categories()
    {
        $categories = Category::with('products')->paginate(15);

        return view('admin.catalog.categories', [
            'categories' => $categories
        ]);
    }


    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories'
        ]);

        Category::create($validated);

        return back()->with('success', 'Catégorie créée avec succès!');
    }

    public function destroyCategory(Category $category)
    {
        $category->delete();

        return back()->with('success', 'Catégorie supprimée avec succès!');
    }
}
