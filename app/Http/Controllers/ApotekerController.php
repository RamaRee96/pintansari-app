<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApotekerController extends Controller
{
    public function dataObat()
    {
        return view('/apoteker/dataObat');
    }
}
