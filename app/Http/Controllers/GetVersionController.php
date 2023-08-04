<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetVersionController extends Controller
{
    public function index()
    {
        $android = "1.12.68";
        $ios = "1.1.8";

        return response()->json([
            "android" => $android,
            "ios" => $ios
        ], 200);
    }
}
