<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{


    public function index()
    {
        $title = 'Titulo';
        $xss = '<scrip>alert("Ataque XSS");</script>';
        $var1 = 123;
        $arrayData = [];

        return view('site.home.index',compact('title', 'xss', 'var1', 'arrayData'));
    }

    public function Contato()
    {
        return view('site.contact.contact');
    }
    public function Categoria($id)
    {
        return "Super lista de produtos {$id}";
    }
    public function Categoria2($id=1)
    {
        return "lista de produtos {$id}";
    }
}
