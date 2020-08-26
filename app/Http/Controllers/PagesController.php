<?php

namespace site\Http\Controllers;

use Illuminate\Http\Request;

use site\Http\Requests;
use site\Http\Controllers\Controller;

class PagesController extends Controller
{

    public function home()
    {

        return view('home');
    }
    public function about()
    {

        return view('about');
    }
    public function contact()
    {

        return view('tickets.create');
    }
    public function faq()
    {

        return view('faq');
    }
    public function help()
    {

        return view('help');
    }
    public function terms()
    {

        return view('terms');
    }
    public function privacy()
    {

        return view('privacy');
    }
    public function testimonials()
    {

        return view('testimonials');
    }
}
