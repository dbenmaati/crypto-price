<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    @php use Illuminate\Support\Str; @endphp
    @if(isset($page))<title>{{ $settings->site_title }} | {{ $page->meta_title }}</title>@endif
    @if(isset($page))<meta name="description" content="{{ Str::limit($page->meta_description, 180) }}">@endif
    
    <meta name="keywords" content="crypto, cryptocurrency, bitcoin, coins">
    <meta name="robots" content="index, follow">

    <link rel="shortcut icon" href="{{ Storage::disk('public')->url($settings->site_favicon) }}" />
    <link rel="apple-touch-icon-precomposed" href="{{ Storage::disk('public')->url($settings->site_favicon) }}" />

    <!-- Style CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/swiper-bundle.min.css') }}" >
    <!-- End Style CSS -->
</head>