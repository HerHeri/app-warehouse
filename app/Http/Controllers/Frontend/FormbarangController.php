<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormbarangController extends Controller
{
    function formMasuk(){
        return view('home.form-masuk');
    }

    function formKeluar(){
        return view('home.form-masuk');
    }
}
