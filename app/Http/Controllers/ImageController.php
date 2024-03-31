<?php

namespace App\Http\Controllers;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function show(
        string $params1, ?string $params2 = null, ?string $params3 = null, ?string $params4 = null,
        ?string $params5 = null, ?string $params6 = null, ?string $params7 = null
    )
    {
        $params = $params1.($params2 ? '/'.$params2 : null).($params3 ? '/'.$params3 : null)
            .($params4 ? '/'.$params4 : null).($params5 ? '/'.$params5 : null).($params6 ? '/'.$params6 : null)
            .($params7 ? '/'.$params7 : null);
        $storage_path = storage_path('app/public/'.$params);
        return Image::make($storage_path)->response();
    }
}
