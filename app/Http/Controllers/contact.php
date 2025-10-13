<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contact extends Controller
{
    function show()
    {
        $message = 'Je moet me niet bellen';
        return ['message' => $message];
    }
}
