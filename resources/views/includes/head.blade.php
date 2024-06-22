<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $settings->site_title }} | Page Title</title>

    <!-- Style CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/swiper-bundle.min.css') }}" >
    <!-- End Style CSS -->

    <link rel="shortcut icon" href="{{ Storage::disk('public')->url($settings->site_favicon) }}" />
    <link rel="apple-touch-icon-precomposed" href="{{ Storage::disk('public')->url($settings->site_favicon) }}" />
</head>