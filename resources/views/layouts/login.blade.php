<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
        <h1><a><img src="{{asset('images/main_logo.png')}}"></a></h1>
                <div class="mainMenu">
                    <p>
                        {{Auth::user()->username}}さん
                        <span></span>
                    </p>
                    <img src="{{asset('images/'.Auth::user()->images)}}" class="icon2">
                    <!--Auth::user()でユーザーのデータをすべて取得する。-->
                <div>
                <ul class="menu">
                    <li class="float"><a href="/top">ホーム</a></li>
                    <li class="float"> <a href="/mypage">プロフィール</a></li>
                    <li class="float"><a href="/logout">ログアウト</a></li>
                </ul>
            </div>
            </div>
        </div>
    </header>
  <div id="row">
     <div id="container">
            @yield('content')
     </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{Auth::user()->username}}さんの</p>
                <div class="followCount">
                <p >フォロー数</p>
                <p>{{$followCount}}名</p>
                </div>
                <p class="btn2"><a href="/followList">フォローリスト</a></p>
                <div class="followCount">
                <p>フォロワー数</p>
                <p>{{$followerCount}}名</p>
                </div>
                <p class="btn2"><a href="/followerList">フォロワーリスト</a></p>
            </div>
            <p class="btn3"><a href="/search">ユーザー検索</a></p>
        </div>
  </div>
    <footer>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>


<div id="modal-bg"></div>

</body>
</html>
