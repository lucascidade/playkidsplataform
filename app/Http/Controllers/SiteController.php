<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function contato()
    {
        return view('site.contato', ['titulo' => 'Contato']);
    }
}
