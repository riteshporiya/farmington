<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use App\Models\Plant;
use App\Models\Post;
use App\Models\Seed;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends AppBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): \Illuminate\Contracts\Support\Renderable
    {
        $data['users'] = User::where('user_type', User::USER)->count();
        $data['plants'] = Plant::count();
        $data['seeds'] = Seed::count();
        $data['garden'] = Garden::count();
        
        
        return view('home', compact('data'));
    }
    
    public function userIndex()
    {
        $data['blog'] = Post::where('user_id', getLoggedInUserId())->count();
        
        return view('client.dashboard.index', compact('data'));
    }
}
