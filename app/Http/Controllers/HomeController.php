<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use TCG\Voyager\Models\DataRow;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $tag_options = DataRow::query()->where('field', 'tags')->first();
        $tag_options = $tag_options && $tag_options->details && $tag_options->details->options ? $tag_options->details->options : [];

        $products = Product::query()->paginate(9, '*', 'page', $request->filled('page') ? $request->page : 1);

        return view('home', [
            'tag_options' => $tag_options,
            'products' => $products
        ]);
    }

    public function show()
    {

    }
}
