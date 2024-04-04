<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use TCG\Voyager\Models\DataRow;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $tag_options = DataRow::query()->select('details')->where('field', 'tags')->first();
        $tag_options = $tag_options && $tag_options->details && $tag_options->details->options ? $tag_options->details->options : [];

        $products = Product::query()->select(['name', 'description', 'tags', 'type', 'slug', 'images']);
        if ($request->filled('search')) {
            $products = $products->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('type'))
            $products = $products->where('type', $request->type);
        if ($request->filled('tags')) {
            $tags = array_flatten(array_filter(explode(',', $request->tags)));
            $products = $products->whereJsonContains('tags', $tags[0]);
            for($i = 1; $i < count($tags); $i++) {
                $products = $products->orWhereJsonContains('tags', $tags[$i]);
            }
        }
        $products = $products
            ->paginate(9, '*', 'page', $request->filled('page') ? $request->page : 1);

        return view('home', [
            'tag_options' => $tag_options,
            'products' => $products
        ]);
    }

    public function show($slug)
    {
        $detail = Product::query()->where('slug', $slug)->first();
        $others = Product::query()->select(['name', 'description', 'tags', 'type', 'slug', 'images'])->limit(3)->get();
        return view('show', [
            'detail' => $detail,
            'others' => $others,
        ]);
    }
}
