<?php

namespace App\Http\Controllers;

use App\Models\Lowongan as ModelsLowongan;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Middleware;
use Spatie\RouteAttributes\Attributes\Prefix;

#[Prefix('component')]
#[Middleware('web')]
class ExampleComponentController extends Controller
{
    #[Get('/create')]
    public function form(){
        $model = new ModelsLowongan();
        return view('components.example.form', compact('model'));
    }
}
