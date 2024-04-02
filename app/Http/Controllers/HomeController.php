<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\DataRow;

class HomeController extends Controller
{
    public function index()
    {
        $tag_options = DataRow::query()->where('field', 'tags')->first();
        $tag_options = $tag_options && $tag_options->details && $tag_options->details->options ? $tag_options->details->options : [];
        dd($tag_options->toArray());
        return view('home');
    }

    public function show()
    {

    }
}
