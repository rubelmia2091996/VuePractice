<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index()
    {
        $startTime = microtime(true);
        $users = Redis::get('users.all');
        if (!$users) {
            $users = User::all();
            Redis::set('users.all', json_encode($users), 'EX', 60 * 60);
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