<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- 文字コードの指定 -->
        <meta charset="utf-8">
        <!-- IEで常に標準モードで表示させる -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- viewport(レスポンシブ対応) -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- SEO start --}}
        @yield('seo')
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:image" content="">
        <meta property="og:type" content="website">
        <meta property="og:image" content="" />
        {{-- SEO end --}}
        <!-- css -->
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <link href="/css/common/common.css" rel="stylesheet">
        @yield('css')
    </head>
    <body>
        <div class="overlay" id="js-overlay"></div>
        {{--  header start  --}}
        <header>
            <div class="header-inner">
                <h1 class="header-top-logo">
                    <a href="{{ url('/') }}" class="header-top-link">
                        Book Shelf
                    </a>
                </h1>
                <i class="fas fa-bars nav-bar"></i>
                <nav class="header-nav-menu">
                    <ul class="header-menu">
                        <li><a href="{{ url('/about') }}">サービス概要</a></li>
                        <li><a href="{{ url('/regist/book') }}">レビューする</a></li>
                        <li><a href="{{ url('/booklist') }}">本の一覧を見る</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        {{-- header end --}}
        @yield('content')
        {{-- footer start --}}
        <footer>
            <div class="footer-bg-img-top footer-img">
            </div>
            <div class="container">
                <section>
                    <h2 class="footer-title">Book Shelf - オススメの本を見つける・紹介する -</h2>
                    <p class="copyright">&copy;2019 Book Shelf</p>
                    <div class="row sns-shared">
                        <a href="http://twitter.com/share?text=Book Shelf - オススメの本を見つける・紹介する -&url={{ url('/') }}" class="sns-link" target="_blank">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                        <a href="http://www.facebook.com/sharer.php?u={{ url('/')}}}&amp;t=Book Shelf - オススメの本を見つける・紹介する -" class="sns-link" target="_blank">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                    </div>
                </section>
            </div>
            <div class="footer-bg-img-bottom footer-img">
            </div>
        </footer>
        {{-- footer end --}}
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="/js/book/common.js"></script>
    @yield('javascript')
</html>


