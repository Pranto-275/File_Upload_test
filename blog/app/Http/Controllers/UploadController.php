<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function onFile(Request $request)
    {
        // $path = $request->file('Filekey')->store('images');
        //when we have to upload file in public folder in storage
        $path = $request->file('Filekey')->store('public');
        $result = DB::table('my_file_table')->insert(['my_file' => $path]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }
}
