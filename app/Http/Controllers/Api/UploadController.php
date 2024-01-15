<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function handle(Request $request)
    {
        $pathToFile = $request->file('image')->store('images', 'public');

        return response()->json(['url'=>url('/storage/'.$pathToFile)],200);
    }
}
