<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

/**
 * Class GeneralControllers
 * @package App\Http\Controllers
 */
class GeneralControllers extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function home()
    {
        return response()->json(['message' => 'Forest API']);
    }

    public function ping()
    {
        return response()->json(['PONG']);
    }
}
