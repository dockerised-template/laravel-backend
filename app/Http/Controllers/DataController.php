<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DataController extends Controller
{
    public function index(Request $request)
    {
        return response()->json([]);
    }

    public function reset(Request $request)
    {
        if (env('APP_ENV') === 'testing')
        {
            Artisan::call('migrate:refresh', [
                '--seed' => $request->input('seed')
            ]);
            return response()->json(User::first());
        }
    }
}
