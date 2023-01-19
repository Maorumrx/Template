<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cache;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Models\User;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Homecontroller extends Controller
{
    //
    public function announcement($filename)
    {
        $path = Storage::path('announcement/'.$filename);
        if(!File::exists($path)){
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $responese = Response::make($file, 200);
        $responese->header('content-type', $type);
        return $responese;
    }
}
