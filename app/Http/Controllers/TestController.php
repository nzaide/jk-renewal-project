<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    /**
     * Invoke test method
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke()
    {
        return view('test');
    }
}
