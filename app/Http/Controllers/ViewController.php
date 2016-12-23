<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * nanti dipindah k proper controller
     */
    public function product()
    {
        return view('product');
    }
}
