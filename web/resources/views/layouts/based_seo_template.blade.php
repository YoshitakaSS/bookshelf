@section('seo')
    <title>【BookShelf】{{$title}}</title>
    <meta name="description" content="{{$description}}">
    <meta name="keywords" content="{{$keywords}}">
    <meta name="twitter:title" content="{{$title}}">
    <meta name="twitter:description" content="{{$description}}">
    <meta property="og:site_name" content="{{$title}}">
    <meta property="og:title" content="{{$title}}">
    <meta property="og:description" content="{{$description}}">
    <meta property="og:url" content="{{$url}}">
    @if($isnoindex)
    <meta name="robots" content="noindex,nofollow">
    @endif
@endsection
