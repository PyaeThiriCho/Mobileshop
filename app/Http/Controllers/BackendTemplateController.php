<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendTemplateController extends Controller
{
     public function tablefun()
    {
        return view('backend.table');
    }
}
