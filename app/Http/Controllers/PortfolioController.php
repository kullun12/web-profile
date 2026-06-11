<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Prefix;

#[Prefix('portfolio')]
class PortfolioController extends Controller
{
    #[Get('/')]
    public function portfolio()
    {
        return view('Portfolio.index');
    }
}
