<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientsController extends Controller
{

    public function store(Request $request): JsonResponse
    {
        Log::info($request->all());
        return response()->json([
            'status' => 'test',
        ]);
    }
}
