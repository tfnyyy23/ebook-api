<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me(){
        return [
            'NIS' => 3103120221,
            'Name' => 'Tifany Fadilah Ahnaf',
            'Phone' => '085702092095',
            'Class' => 'XII RPL 7'
        ];
    }
}
