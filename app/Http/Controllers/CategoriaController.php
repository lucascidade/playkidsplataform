<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function categorias()
    {
        return view('site.categorias', ['titulo' => 'Categorias']);
    }
}
