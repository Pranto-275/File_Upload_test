<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function onFile(Request $request)
    {
        $request->file('Filekey')->store('images');
    }
}
