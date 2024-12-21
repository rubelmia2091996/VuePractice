<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $startTime = microtime(true);
        $page = $request->input('page', 1);
        $cacheKey = 'users.page.' . $page;
        $users = Redis::get($cacheKey);
        if (!$users) {
            $users = User::paginate(10); 
            Redis::set($cacheKey, json_encode($users), 'EX', 60 * 60);
        } else {
            $users = json_decode($users);
        }
        $endTime = microtime(true);
        $executionTime = $endTime - $startTime;
        return inertia('Home', [
            'users' => $users,
            'executionTime' => $executionTime,
        ]);
    }

}