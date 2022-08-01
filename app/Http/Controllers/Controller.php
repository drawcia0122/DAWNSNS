<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
         $this->middleware(function ($request, $next) {

            $followCount = DB::table('follows')
            ->where('follower',Auth::id())
            ->count();

            $followerCount = DB::table('follows')
            ->where('follow',Auth::id())
            ->count();

           // viewに共通データを渡す
           View::share('followCount',$followCount);
           View::share('followerCount',$followerCount);


        return $next($request);
    });
    }
}
