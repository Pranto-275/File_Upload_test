<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DownloadController extends Controller
{
    public function onDownload($filename, $name)
    {
        $result = Storage::download($filename . "/" . $name);
        return $result;
    }

    public function onSelectFileList()
    {
        $result = DB::table('my_file_table')->get();
        return $result;
    }
}
