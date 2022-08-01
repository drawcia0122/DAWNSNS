<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function followList(){

        $followlists = DB::table('follows')
        ->join('users','users.id', '=', 'follows.follow')
        ->where('follower',Auth::id())
        ->select('users.id','users.images')
        ->get();

        $lists = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('follows','users.id', '=', 'follows.follow')
            ->where('follower',Auth::id())
            ->select('posts.posts', 'posts.created_at', 'users.username', 'users.images')
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('follows.followList',['followlists'=>$followlists , 'lists'=>$lists]);

    }

    public function followerList(){

        $followerlists = DB::table('follows')
        ->join('users','users.id', '=', 'follows.follower')
        ->where('follow',Auth::id())
        ->select('users.id','users.images')
        ->get();

        $lists = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->join('follows','users.id', '=', 'follows.follower')
            ->where('follow',Auth::id())
            ->select('posts.posts', 'posts.created_at', 'users.username', 'users.images')
            ->orderBy('posts.created_at', 'desc')
            ->get();


        return view('follows.followerList',['followerlists'=>$followerlists , 'lists'=>$lists]);
    }
}
