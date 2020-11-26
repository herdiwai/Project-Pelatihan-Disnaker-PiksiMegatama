<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function show() {
        return view('template.home');
    }

    public function about() {
        return view('template.about');
    }

    public function contact() {
        return view('template.contact');
    }

}
