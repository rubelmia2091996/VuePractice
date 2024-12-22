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
        if(auth()->user()){
            $users = Redis::get($cacheKey);
            if (!$users) {
                $users = User::paginate(10); 
                Redis::set($cacheKey, json_encode($users), 'EX', 60 * 60);
            } else {
                $users = json_decode($users);
            }
            $endTime = microtime(true);
            $executionTime = $endTime - $startTime;
            if($request->search){
                $users = User::when($request->search, function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%')
                        ->orWhere('email', 'like', '%' . $request->search . '%');
                    })->paginate(5)->withQueryString();
            }

        

            return inertia('Home', [
                'users' => $users,
                'executionTime' => $executionTime, 
                'searchTerm' => $request->search,
                'can' => [
                        'delete_user' =>
                        Auth::user() ?
                            Auth::user()->can('delete', User::class) :
                            null
                    ]
            ]);
        }else{
            $endTime = microtime(true);
            $executionTime = $endTime - $startTime;
            return inertia('Home', [
                'users' => [],
                'executionTime' => $executionTime,
                'searchTerm' => $request->search,
                'can' => [
                        'delete_user' =>
                        Auth::user() ?
                            Auth::user()->can('delete', User::class) :
                            null
                    ]
            ]);
        }
       
    }

}