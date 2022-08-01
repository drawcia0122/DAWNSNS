<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class PostsController extends Controller
{
    //
    public function index(){


        $lists = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'posts.updated_at', 'users.username', 'users.images')
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('posts.index',['lists'=>$lists]);


    }

    public function tweet (Request $request){

    $request->validate([
        'tweet'=>'required'
    ]);

    $tweet = $request->input('tweet');

    DB::table('posts')->insert([
            'posts' => $tweet,
            'user_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/top');
    }

  public function update(Request $request)
    {
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        DB::table('posts')
            ->where('id', $id)
            ->update(
                ['posts' => $up_post , 'updated_at'=> now()]
            );

        return redirect('/top');
    }

 public function delete($id)
    {
        DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }

}
