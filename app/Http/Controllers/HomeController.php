<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
      dd('works');
    }

    public function store()
    {
      response()->json(['result' => 'success']);
    }
}
