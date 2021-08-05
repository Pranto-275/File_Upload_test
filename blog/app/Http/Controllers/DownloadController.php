<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function onDownload()
    {
        $result = Storage::download('images/GEAKfGwkKKErsmOIlD59T5GyV0DfM4vBps9ZQebb.jpg');
        return $result;
    }
}
