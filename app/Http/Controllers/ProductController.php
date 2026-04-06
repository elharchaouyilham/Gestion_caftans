<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display all caftans
     */
    public function caftans()
    {
        $query = Product::query();

        // Filter by category (Caftans = 1)
        $query->where('category_id', 1);

        // Apply filters
        $this->applyFilters($query);

        $products = $query->paginate(12);
        $categories = Category::all();

        // Get filter options for the view
        $filterOptions = $this->getFilterOptions();

        return view('pages.caftans', [
            'products' => $products,
            'categories' => $categories,
            'filterOptions' => $filterOptions,
            'currentFilters' => request()->all()
        ]);
    }

    /**
     * Display all accessories
     */
    public function accessoires()
    {
        $query = Product::query();

        // Filter by category (Accessories = 2)
        $query->where('category_id', 2);

        // Apply filters
        $this->applyFilters($query);

        $products = $query->paginate(12);
        $categories = Category::all();

        // Get filter options for the view
        $filterOptions = $this->getFilterOptions();

        return view('pages.accessoires', [
            'products' => $products,
            'categories' => $categories,
            'filterOptions' => $filterOptions,
            'currentFilters' => request()->all()
        ]);
    }

    /**
     * Apply filters to product query
     */
    private function applyFilters(&$query)
    {
        // Filter by style
        if (request()->has('style') && !empty(request()->style)) {
            $styles = is_array(request()->style) ? request()->style : [request()->style];
            $query->whereIn('style', $styles);
        }

        // Filter by ceremony type
        if (request()->has('ceremony_type') && !empty(request()->ceremony_type)) {
            $ceremonyTypes = is_array(request()->ceremony_type) ? request()->ceremony_type : [request()->ceremony_type];
            $query->whereIn('ceremony_type', $ceremonyTypes);
        }

        // Filter by color
        if (request()->has('color') && !empty(request()->color)) {
            $colors = is_array(request()->color) ? request()->color : [request()->color];
            $query->whereIn('color', $colors);
        }

        // Filter by size
        if (request()->has('size') && !empty(request()->size)) {
            $sizes = is_array(request()->size) ? request()->size : [request()->size];
            $query->whereIn('size', $sizes);
        }

        // Filter by price range
        if (request()->has('min_price') && !empty(request()->min_price)) {
            $query->where('prix', '>=', (int)request()->min_price);
        }
        if (request()->has('max_price') && !empty(request()->max_price)) {
            $query->where('prix', '<=', (int)request()->max_price);
        }

        // Search by name or description
        if (request()->has('search') && !empty(request()->search)) {
            $searchTerm = '%' . request()->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('nom', 'like', $searchTerm)
                    ->orWhere('description', 'like', $searchTerm);
            });
        }

        // Sort results
        $sort = request()->get('sort', 'newest');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('prix', 'ASC');
                break;
            case 'price_desc':
                $query->orderBy('prix', 'DESC');
                break;
            case 'popular':
                $query->withCount('reservations')
                    ->orderBy('reservations_count', 'DESC');
                break;
            case 'name_asc':
                $query->orderBy('nom', 'ASC');
                break;
            case 'name_desc':
                $query->orderBy('nom', 'DESC');
                break;
            default: // newest
                $query->orderBy('created_at', 'DESC');
        }
    }

    /**
     * Get available filter options from database
     */
    private function getFilterOptions()
    {
        return [
            'styles' => Product::distinct()->pluck('style')->filter()->values()->sort()->toArray(),
            'colors' => Product::distinct()->pluck('color')->filter()->values()->sort()->toArray(),
            'sizes' => Product::distinct()->pluck('size')->filter()->values()->sort()->toArray(),
            'ceremonyTypes' => Product::distinct()->pluck('ceremony_type')->filter()->values()->sort()->toArray(),
            'priceRange' => [
                'min' => Product::min('prix') ?? 0,
                'max' => Product::max('prix') ?? 5000
            ]
        ];
    }

    /**
     * Filter products by style, color, size, and ceremony type (AJAX)
     */
    public function filter(Request $request)
    {
        $query = Product::query();

        // Apply filters
        $this->applyFilters($query);

        $products = $query->paginate(12);

        if ($request->wantsJson()) {
            return response()->json($products);
        }

        return view('partials.products-grid', ['products' => $products]);
    }

    /**
     * Display product detail
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $id)
            ->limit(4)
            ->get();

        // Get availability info
        $reservedDates = $product->reservations()
            ->where('status', '!=', 'cancelled')
            ->get(['date_reservation', 'date_retour']);

        return view('pages.product-detail', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'reservedDates' => $reservedDates
        ]);
    }
}
