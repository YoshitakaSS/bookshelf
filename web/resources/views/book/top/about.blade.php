@extends('layouts.common')
@include('layouts.based_seo_template',[
    'title' => '本を探す・見つける・共通する・購入する',
    'description' => 'BookShelfは世界の誰かに自分の好きな本を共有するためのサービスです。自分の好きな本を世界に共有しましょう！あなたが共有した本が世界の誰かの人生を大きく変えるかもしれません。',
    'keywords' => '本　おすすめ',
    'url' => '',
    'isnoindex' => false
])
@section('content')
    <div class="main-wrapper-viewport">
        <div class="container">
            <section class="first-section wrap-section">
                <h1 class="section-head-title">
                    BookShelf<br>
                    - オススメの本を見つける・紹介する -
                </h1>
                <p class="section-catchecopy">
                    自分の好きな本や他人が好きな本を共有し、本を買って作者を応援しよう！<br>
                    ここは本との出会いと、『本』という作品を作ってくれた人たちに少しだけ手助けするサービスです。
                </p>
            </section>
            <section class="second-section wrap-section">
                <h2 class="section-head-title">
                    おすすめの本を探す
                </h2>
                <div class="section-icon">
                    <i class="fas fa-book"></i>
                </div>
                <p class="section-catchecopy">
                    世界の誰かが読んでレビューされた本が、ここのサービスに登録されます。<br>
                    技術書、参考書、漫画、小説、雑誌ありとあらゆる本を探してみましょう。
                </p>
            </section>
            <section class="third-section wrap-section">
                <h2 class="section-head-title">
                    好きな本を共有しよう
                </h2>
                <div class="section-icon">
                    <i class="fas fa-share-alt-square"></i>
                </div>
                <p class="section-catchecopy">
                    <strong>『自分の好きな本を世界の誰かに読んでもらいたい。』</strong><br>
                    その気持ちを是非このサービス内に書いてください。<br>
                    その気持ちが、作者や同じ読者の助けになります。
                </p>
            </section>
            <section class="fourth-section wrap-section">
                <h2 class="section-head-title">
                    共有された本を購入しよう
                </h2>
                <div class="section-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <p class="section-catchecopy">
                    あなたの気になった、気に入った本があったら是非購入してください。<br>
                    そのあなたの行動が本の作者の力になります。<br>
                    <span class="complement">※当サービスではGoogle Play StoreとAmazonを推奨しています。</span>
                </p>
            </section>
            <div class="top-view-wrap">
                <a href="{{ url('/') }}" class="top-view-btn">
                    本を探す
                </a>
            </div>
        </div>
    </div>
@endsection


{{-- css start  --}}
@section('css')
    <link href="/css/book/top/about.css" rel="stylesheet">
@endsection
{{-- css end  --}}
