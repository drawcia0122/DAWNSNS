<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use DB;

class UsersController extends Controller
{
    //
public function mypage(Request $request){



$profile = DB::table('users')
        ->where('id',Auth::id())
        ->select('images','username','bio','id','mail','password')
        ->first();


return view ('users.mypage',['profile'=>$profile]);
}


public function profileUpdate(Request $request){

    $data = $request->input();

      Validator::make($data, [
            'username' => 'required|string|min:4|max:12',
            'mail' => 'required|string|email|min:4|max:50|',

        ],[
            'required' => 'この項目は必須です',
            'min' => '4文字以上で入力お願いします。',
            'username.max' => '名前は12文字までです。',
            'mail.max' => '50文字以内でお願いします。',
            'email' => 'メールアドレスでお願いします。',
            'regex' => '半角英数字でお願いします。',
        ])->validate();

       $password = $request->input('password');
         if(isset($password)){


            //本当はここにパスワードのバリデーションを書くけど省略してる。


        DB::table('users')
        ->where('id',Auth::id())
        ->update([
            'password'=>bcrypt($password)
        ]);
         }

    $up_username = $request->input('username');
    $up_mail = $request->input('mail');
    $up_bio = $request-> input('bio');
    $up_image = $request->file('images');

      if($up_image){
         $imageName = $up_image ->getClientOriginalName();

        DB::table('users')
        ->where('id',Auth::id())
        ->update([
            'images'=>$imageName
        ]);

          $up_image->storeAs('images', $imageName, 'SAVE');
          //storeAs(場所、名前、処理)
         }



        DB::table('users')
          ->where('id', Auth::id())
          ->update([
           'username'=>$up_username,
            'mail' => $up_mail,
            'bio' => $up_bio

          ]);


        return back();
}


    public function profile($id){

        $profile = DB::table('users')
        ->where('id',$id)
        ->select('images','username','bio','id')
        ->first();


         $followlist=DB::table('follows')
         ->where('follower',Auth::id())
         ->get()
         ->toArray();
         $number=array_column($followlist,'follow');


         $lists = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->where('user_id',$id)
            ->select('posts.user_id', 'posts.posts', 'posts.created_at', 'users.username', 'users.images')
            ->orderBy('posts.created_at', 'desc')
            ->get();


        return view('users.profile',['lists'=>$lists,'profile'=>$profile,'number'=>$number]);
    }




    public function test(){

         $lists = DB::table('posts')
            ->where('user_id',Auth::id())
            ->select('posts')
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('users.test',['lists'=>$lists]);
    }






    public function search(Request $request){

         $search = $request->input('search');
         if($search){
             $users=DB::table('users')
             ->where('username','like','%'.$search.'%')
             ->where('id','<>',Auth::id())
             ->get();
         }else{
             $users=DB::table('users')
             ->where('id','<>',Auth::id())
             ->get();
         }

         $followlist=DB::table('follows')
         ->where('follower',Auth::id())
         ->get()
         ->toArray();
         $numbers=array_column($followlist,'follow');
         //自分がフォローしてる人のID番号に絞って取得している array_columnは値だけを抜き出して羅列している

          return view('users.search',['search'=>$search,'users'=>$users,'numbers'=>$numbers]);
    }

    public function follow($id){

        DB::table('follows')->insert([
            'follow' => $id,
            'follower' => Auth::id(),
            'created_at' => now(),
        ]);

        return back();
    }

public function unfollow($id){

        DB::table('follows')
        ->where('follow', $id)
        ->where('follower',Auth::id())
        ->delete();
        //行ごと消すらしい
        return back();
        // 直前のリンクに戻るらしい
    }





}
