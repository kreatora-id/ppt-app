<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use TCG\Voyager\Models\DataRow;

class HomeController extends Controller
{
    public function index()
    {
        $tag_options = DataRow::query()->where('field', 'tags')->first();
        $tag_options = $tag_options && $tag_options->details && $tag_options->details->options ? $tag_options->details->options : [];

        $products = Product::query()->get();

        return view('home', [
            'tag_options' => $tag_options,
            'products' => $products
        ]);
    }

    public function show()
    {

    }
}
