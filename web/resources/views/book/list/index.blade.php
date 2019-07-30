@extends('layouts.common')
@include('layouts.based_seo_template',[
    'title' => 'おすすめの本の一覧を見る',
    'description' => 'BookShelfで登録されたおすすめの本の一覧です。世界中の誰かが登録した本を確認することができます。本の詳細を是非のぞいてみてください。',
    'keywords' => '本　おすすめ　一覧',
    'url' => '',
    'isnoindex' => false
])
@section('content')
    <div class="main-content-wrapper">
        <div class="container">
			<section>
				<h1 class="head_line">
					レビューされた本の一覧
				</h1>
				<p class="desc">
					現在レビューされている本の一覧になります。<br>
					世界の誰かがあなたにも読んで欲しい本をレビューし、投稿してくれています。<br>
					本の詳細を是非のぞいてみてください。
				</p>
			</section>
			<section class="book-list-section">
				<ul class="book-list">
                    @foreach ($items as $item)
					<li class="item">
						<a class="over-lay-link" href="/detail/book/{{ $item['bookId'] }}" title="{{ $item['title'] }}"></a>
                        <h3 class="title">{{ $item['title'] }}</h3>
						<figure>
							<img src="/img/book/load.gif" data-src="{{ $item['thumbnail'] }}" alt="{{ $item['title'] }}" style="width: 100%;">
						</figure>
                    </li>
                    @endforeach
				</ul>
			</section>
        </div>
    </div>
@endsection

{{-- css start  --}}
@section('css')
    <link href="/css/book/list/list.css" rel="stylesheet">
@endsection
{{-- css end  --}}

