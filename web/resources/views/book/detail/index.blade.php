@extends('layouts.common')
@include('layouts.based_seo_template',[
    'title' => $info['bookItem']['title'] . 'のレビュー・感想 | 通販',
    'description' => $info['bookItem']['title'] . 'のレビュー・感想一覧です。【BookShelf】であなたの読んだおすすめの本のレビューを投稿する・共有する。' . $info['bookItem']['title'] .'を電子書籍・通販で購入することも可能です。',
    'keywords' => $info['bookItem']['title'] . ' レビュー, ' .$info['bookItem']['title'] . ' 感想',
    'url' => '',
    'isnoindex' => false
])
@section('content')
    <div class="main-content-wrapper">
        <div class="container">
            <section class="book-info">
                <div class="book-block">
                    <div class="book-top-info" id="js-book-info">
                        <h1 class="book-title">
                            {{ $info['bookItem']['title'] }}
                        </h1>
                        <div class="book-detail-info row">
                            <div class="book-author col-1">
                                <span>著者：</span>{{ $info['bookItem']['author'] }}
                            </div>
                            <div class="book-publisher col-1">
                                <span>出版社：</span>{{ $info['bookItem']['publisher'] }}
                            </div>
                        </div>
                    </div>
                    <div class="book-bottom-info">
                        <div class="row">
                            <div class="book-bottom-info-left">
                                <img src="{{ $info['bookItem']['thumbnail'] }}" class="book-thumnail">
                            </div>
                            <div class="book-bottom-info-right">
                                <div class="book-descrption col-2">
                                    <div class="bottom-t">
                                        内容紹介
                                    </div>
                                    <div class="description detail-explain">
                                        {{ $info['bookItem']['description'] }}
                                    </div>
                                </div>
                                <div class="book-price col-2">
                                    <div class="bottom-t">
                                        値段
                                    </div>
                                    <div class="price-info detail-explain">
                                        {{ $info['bookItem']['price'] }}円<span class="sup"> ※GooglePlayStore調べ</span>
                                    </div>
                                </div>
                                <div class="bottom-btn-list">
                                    <div class="products-link-list row">
                                        @if (!empty($info['bookItem']['gooLink']))
                                        <div class="btn googleplay-btn">
                                            <a href="{{$info['bookItem']['gooLink']}}" target="_blank">
                                                Googleで探す
                                            </a>
                                        </div>
                                        @endif
                                        @if (!empty($info['bookItem']['amaLink']))
                                        <div class="btn amazon-btn">
                                            <a href="{{$info['bookItem']['amaLink']}}" target="_blank">
                                                Amazonで探す
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="add-comment-block">
                <div class="add-comment-btn" id="js-add-comment">
                    この本のレビューを追加する
                </div>
                <div class="modal-add-comment-block" id="js-modal-review">
                    <form action="/regist/detail/book/{{ $info['bookItem']['bookId'] }}/comment" method="post" class="review-post-info">
                        @csrf
                        <div class="review-star-sec sec">
                            <div class="lay-txt col-title">
                                全体的な評価
                            </div>
                            <div class="review-star-list">
                                <input id="star1" type="radio" name="star" value="5" />
                                <label for="star1">★</label>
                                <input id="star2" type="radio" name="star" value="4" />
                                <label for="star2">★</label>
                                <input id="star3" type="radio" name="star" value="3" />
                                <label for="star3">★</label>
                                <input id="star4" type="radio" name="star" value="2" />
                                <label for="star4">★</label>
                                <input id="star5" type="radio" name="star" value="1" />
                                <label for="star5">★</label>
                            </div>
                            @if ($errors->has('star'))
                            <div class="error-message">{{$errors->first('star')}}</div>
                            @endif
                        </div>
                        <div class="review-input-title-sec sec">
                            <div class="lay-txt col-title">
                                お名前
                            </div>
                            <input type="text" name="username" class="review-input-text review-text" placeholder="無記名でも構いません">
                            <div class="lay-txt col-title">
                                レビュータイトル
                            </div>
                            <input type="text" name="reviewtitle" class="review-input-text review-text">
                            @if ($errors->has('reviewtitle'))
                            <div class="error-message">{{$errors->first('reviewtitle')}}</div>
                            @endif
                        </div>
                        <div class="review-input-text-sec sec">
                            <div class="lay-txt col-title">
                                レビューテキスト
                            </div>
                            <textarea name="reviewtext" class="review-input-text review-textarea"></textarea>
                            @if ($errors->has('reviewtext'))
                            <div class="error-message">{{$errors->first('reviewtext')}}</div>
                            @endif
                        </div>
                        <input type="submit" value="送信" class="submit-btn">
                    </form>
                </div>
            </div>
            <section class="user-review-info">
                <h2 class="review-tilte">《{{ $info['bookItem']['title'] }}》 レビュー</h2>
                <div class="review-list">
                    @foreach ($info['commentItems'] as $item)
                    <div class="review-block">
                        <div class="block-top">
                            <div class="row sp-row">
                                <div class="user-review-title">
                                    {{ $item['commentTitle'] }}
                                </div>
                                <div class="user-review-star">
                                    {{ $item['star'] }}
                                </div>
                            </div>
                        </div>
                        <div class="block-bottom">
                            <div class="user-review-detail">
                                {{ $item['commentDetail'] }}
                            </div>
                            <div class="user-name">
                                {{ $item['userName'] }} さんからの投稿
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection

{{-- css start  --}}
@section('css')
    <link href="/css/book/detail/detail.css" rel="stylesheet">
@endsection
{{-- css end  --}}


{{-- javascript start --}}
@section('javascript')
<script src="/js/book/detail.js" type="text/javascript"></script>
@endsection
{{-- javascript end --}}
