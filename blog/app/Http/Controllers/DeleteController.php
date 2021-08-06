<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function onDelete()
    {
        Storage::delete(['images\FoCzWEH4W60orhBk8e4IlSWvdlXrp0SE1CpzOfOb.jpg', 'otherFile']);
    }
}
