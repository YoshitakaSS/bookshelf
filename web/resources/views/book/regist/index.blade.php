@extends('layouts.common')
@include('layouts.based_seo_template',[
    'title' => 'おすすめの本を登録する',
    'description' => 'BookShelfで自分のおすすめの本を登録して、世界中の人に共有しよう！まだレビューされていない本があったらその本の初めてのレビューアーとして積極的に登録してください',
    'keywords' => '本　おすすめ',
    'url' => '',
    'isnoindex' => false
])
@section('content')
    <div class="main-content-wrapper">
        <div class="container">
            <div class="top-block">
                <h2 class="top-title">レビューする本を探す</h2>
                <div class="search-supplement">
                    テキストを入力し、本を探してみてください<br>
                    キーワードを詳細に入力すると見つかりやすくなります。（例：ホリエモン　本音）<br>
                </div>
                <div class="search-form">
                    <input type="text" name="s" class="form-contorl-input" placeholder="本のタイトル、著者を検索する">
                </div>
            </div>
            <div class="book-list-info">
                <ul class="book-list" id="js-book-list">
                </ul>
            </div>
            <div class="selected-book-info">
                <div class="title">
                    <i class="fas fa-check-circle icon"></i>あなたがレビューする本はこれで良いですか？
                </div>
                <div class="selected-book row">
                    <div class="selected-item-img js-selected-item-img">
                        <img src="">
                    </div>
                    <div class="selected-item-info">
                        <div class="item-title js-item-title">

                        </div>
                        <div class="item-description js-item-description">

                        </div>
                        <div class="item-detail-info">
                            <div class="item-detail js-item-author">
                                著書名：
                            </div>
                            <div class="item-detail js-item-publisher">
                                出版社：
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-block">
                <div class="review-top-title">
                    あなたの好きな本をレビューしよう！
                </div>
                <div class="review-top-title-supplement">
                    今まで自分が読んだ本で面白かったものを他の人のも教えてあげよう<br>
                    あなたが勧めた本が誰かを幸せにするかもしれません。
                </div>
                <form action="{{url('/regist/book/comment')}}" method="post" class="review-post-info">
                    @csrf
                    <div class="review-book-sec">
                        <input type="hidden" name="bktitle" value="" id="js-bktile">
                        <input type="hidden" name="bkdesc" value="" id="js-bkdesc">
                        <input type="hidden" name="img" value="" id="js-img">
                        <input type="hidden" name="price" value="" id="js-price">
                        <input type="hidden" name="author" value="" id="js-author">
                        <input type="hidden" name="publisher" value="" id="js-pub">
                        <input type="hidden" name="glink" value="" id="js-glink">
                        <input type="hidden" name="alink" value="" id="js-alink">
                    </div>
                    @if ($errors->has('bktitle'))
                    <div class="error-message">{{$errors->first('bktitle')}}</div>
                    @endif
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
                        <input type="text" name="reviewtitle" class="review-input-text review-text" id="js-review-title">
                        <div class="count-l">
                            <span id="js-count-l-title">0</span> / 20
                        </div>
                        @if ($errors->has('reviewtitle'))
                        <div class="error-message">{{$errors->first('reviewtitle')}}</div>
                        @endif
                    </div>
                    <div class="review-input-text-sec sec">
                        <div class="lay-txt col-title">
                            レビューテキスト
                        </div>
                        <textarea name="reviewtext" class="review-input-text review-textarea" id="js-review-text"></textarea>
                        <div class="count-l">
                            <span id="js-count-l-text">0</span> / 350
                        </div>
                        @if ($errors->has('reviewtext'))
                        <div class="error-message">{{$errors->first('reviewtext')}}</div>
                        @endif
                    </div>
                    <input type="submit" value="送信" class="submit-btn">
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- css start  --}}
@section('css')
    <link href="/css/book/regist/index.css" rel="stylesheet">
@endsection
{{-- css end  --}}


{{-- javascript start --}}
@section('javascript')
<script src="/js/book/regist.js" type="text/javascript"></script>
@endsection
{{-- javascript end --}}
