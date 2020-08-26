<?php

namespace site\Http\Controllers\Admin;

use Illuminate\Http\Request;

use site\Http\Requests;
use site\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('backend.home');
    }

}
