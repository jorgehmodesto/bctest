<?php

namespace App\Http\Controllers;

use App\Helpers\UrlShortener;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShortenerController extends Controller
{
    public function index()
    {
        return view('shortener/index');
    }

    public function url(Request $request) : JsonResponse
    {
        $shortener = new UrlShortener($request->get('url'));

        $short = $shortener->short();

        return new JsonResponse([
            'short_url' => $short
        ]);

    }
}
