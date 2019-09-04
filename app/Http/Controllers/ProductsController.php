<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    protected $productRepository;

    /**
     * Constructor
     *
     * @param ProductRepository $productRepository Product repository
     */
    public function __construct(
        ProductRepository $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function index(
        Request $request
    ) {
        $products = $this->productRepository->getEnabled()->paginate(9);

        if ($products->count()) {
            if ($products->count() == 1) {
                return $this->show($products->first()->slug);
            } else {
                return view('shop/index', compact('products'));
            }
        }
        abort(404);
    }

    public function show(String $slug)
    {
        $product = $this->productRepository->findBySlug($slug);

        if ($product->enabled) {
            return view('shop/product', compact('product'));
        } else {
            abort(404);
        }
    }
}
