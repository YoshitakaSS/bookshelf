@extends('layouts.common')

@include('layouts.based_seo_template',[
    'title' => '- おすすめの本を見つける・紹介する -',
    'description' => 'BookShelfは世界の誰かに自分の好きな本を共有するためのサービスです。自分の好きな本を世界に共有しましょう！あなたが共有した本が世界の誰かの人生を大きく変えるかもしれません。',
    'keywords' => '本　おすすめ',
    'url' => '',
    'isnoindex' => false
])

@section('content')
<div class="main-content-wrapper">
    <div class="main-image-wrap">
        <div class="main-block">
            <h1 class="main-title">Your Bookshelf</h1>
            <p class="main-desc">自分の好きな本や他人が好きな本を共有しよう<br>
                ここは本との出会いを少しだけ手助けするサービスです
            </p>
        </div>
        <div class="search-form" id="js-top-search">
            <input type="text" class="form-contorl-input" name="s" placeholder="本のタイトルを検索する">
            <i class="fas fa-search search-icon"></i>
        </div>
        <a href="{{ url('regist/book') }} " class="main-image-btn">
            本のレビューを投稿する
        </a>
        <a href="{{ url('booklist')}} " class="main-image-btn">
            レビューされた本の一覧を見る
        </a>
    </div>
    <div class="container">
        <div class="select-box">
            <form action="/list/sort" method="GET" name="sortlist">
                <select id="js-sort-select" name="sort">
                    @foreach (App\Config\TopListSort::getsortList() as $item)
                    <option
                        value="{{ $loop->index }}"
                        @if (!empty(App\Config\TopListSort::selectedSortInfo()))
                            @if (strcmp($sortParam, App\Config\TopListSort::selectedSortInfo()) == 0)
                                selected
                            @endif
                        @endif>
                        {{ $item }}
                    </option>
                    @endforeach
                </select>
            </form>
        </div>
        <section class="section-head">
            <h2 class="section-head-title">
                おすすめの本をピックアップ
            </h2>
            <p class="desc">
                世界の誰かがあなたのために投稿してくれた本をピックアップ！<br>
                是非気に入った本があったらチェックしてください！
            </p>
        </section>
        <div class="books-list">
            @foreach ($items as $item)
            <section class="book-block">
                <div class="book-top-info">
                    <h3 class="book-title">
                        <a href="{{ $item['url'] }}" class="book-link">{{ $item['book']['title'] }}</a>
                    </h3>
                    <div class="book-detail-info row">
                        <div class="book-author col-1">
                            <span>著者：</span>{{ $item['book']['author'] }}
                        </div>
                        <div class="book-publisher col-1">
                            <span>出版社：</span>{{ $item['book']['publisher'] }}
                        </div>
                    </div>
                </div>
                <div class="book-bottom-info">
                    <div class="row">
                        <div class="book-bottom-info-left">
                            <img src="/img/book/load.gif" data-src="{{ $item['book']['thumbnail'] }}" alt="{{ $item['book']['title'] }}" class="book-thumnail">
                        </div>
                        <div class="book-bottom-info-right">
                            <div class="book-descrption col-2">
                                <div class="bottom-t">
                                    内容紹介
                                </div>
                                <div class="description detail-explain">
                                    {{ $item['book']['description'] }}
                                </div>
                            </div>
                            <div class="book-review col-2">
                                <div class="bottom-t row">
                                    レビュー：
                                    <div class="review-star">
                                        {{ $item['star'] }}
                                    </div>
                                </div>
                                <div class="review detail-explain">
                                    {{ $item['commentDetail'] }}
                                </div>
                                <div class="reviewer-info">
                                    {{ $item['userName'] }} さんからの投稿
                                </div>
                            </div>
                            <div class="bottom-btn-list">
                                <div class="continue-btn">
                                    <a href=" {{url($item['url']) }}">
                                        ≫ 続きを見る
                                    </a>
                                </div>
                                <div class="products-link-list row">
                                    @if (!empty($item['book']['gooLink']))
                                    <div class="product-btn googleplay-btn">
                                        <a href="{{ $item['book']['gooLink'] }}" target="_blank">
                                            Googleで探す
                                        </a>
                                    </div>
                                    @endif
                                    @if (!empty($item['book']['amaLink']))
                                    <div class="product-btn amazon-btn">
                                        <a href="{{ $item['book']['amaLink'] }}" target="_blank">
                                            Amazonで探す
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
        </div>
    </div>
</div>
@endsection

{{-- css start  --}}
@section('css')
    <link href="/css/book/top/top.css" rel="stylesheet">
@endsection
{{-- css end  --}}

{{-- javascript start  --}}
@section('javascript')
    <script src="/js/book/top.js"></script>
@endsection
{{-- javascript end --}}
