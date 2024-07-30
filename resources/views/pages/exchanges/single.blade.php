<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $settings->site_title }} | Page Title</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/swiper-bundle.min.css') }}" >
    <link
      href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
      rel="stylesheet"
    />

    <link rel="shortcut icon" href="{{ Storage::disk('public')->url($settings->site_favicon) }}" />
    <link rel="apple-touch-icon-precomposed" href="{{ Storage::disk('public')->url($settings->site_favicon) }}" />
  </head>
    <!-- end Head -->
  <body class="body header-fixed home-2">
    <!-- Header -->
    @include('includes.header')
    <!-- end Header -->

    <!-- PageTitle -->
    <section class="page-title">
      <div class="container">
        <div class="row">
          <div>
            <h3 class="heading" style="text-align:center;">{{ $exchange->name }} Exchange & Trading Pairs Info</h3>
            <ul class="breadcrumb" style="justify-content: center;">
              <li><a style="font-size: 0.8em" href="{{ route('coins.home') }}">Home</a></li>
              <li><span style="font-size: 0.8em" class="fs-18">-></span></li>
              <li><a style="font-size: 0.8em" href="{{ route('exchange.home') }}">Exchange</a></li>
              <li><span style="font-size: 0.8em" class="fs-18">-></span></li>
              <li><span style="font-size: 0.8em" class="fs-18">{{ $exchange->name }}</span></li>
            </ul>
          </div>

        </div>
      </div>
    </section>
    <!-- End PageTitle -->

    <section class="wallet sell amount buy-crypto flat-tabs">
      <div class="container">
        <div class="row">

            <div class="col-xl-3 col-md-12">
                <div class="main info" style="margin-right:10px;">
                <div style="display: flex; justify-content: center; align-items: center;">
                    <img src="http://127.0.0.1:8000/storage/coins/bitcoin-logo.png" alt="Round Image" style="border-radius: 50%; width: 45px; height: 45px;">
                    <h6 style="margin: 0 0 0 10px;">{{ $exchange->name }}
                    </h6>
                </div>

                <br><hr><br>

                <ul>
                    <li><div class="content"><p>rank</p><h6 style="font-size: 14px;" class="price" id="rank">-</h6></div></li>
                    <li><div class="content"><p>tradingPairs</p><h6 style="font-size: 14px;" class="price" id="tradingPairs">-</h6></div></li>
                    <li><div class="content"><p>volumeUsd</p><h6 style="font-size: 14px;" class="price" id="volumeUsd">-</h6></div></li>
                    <li><div class="content"><p>percentTotalVolume</p><h6 style="font-size: 14px;" class="price" id="percentTotalVolume">-</h6></div></li>
                </ul>
               
                <br><hr><br>
                
                <div class="button-loadmore">
                    <a style="width: 100%; border: 2px solid orange;" href="{{ $exchange->website }}">Website</a>
                </div>
                <br>
                <ul style="display: flex; justify-content: center; align-items: center; font-size: 1.7em; padding: 0; margin: 0;">
                <li><a style="font-size: 0.8em; margin-right: 15px;" href="{{ $settings->telegram }}"><span class="fa-brands fa-twitter"></span></a></li>
                    <li><a style="font-size: 0.8em; margin-right: 15px;" href="{{ $settings->telegram }}"><span class="fa-brands fa-telegram"></span></a></li>
                    <li><a style="font-size: 0.8em; margin-right: 15px;" href="{{ $settings->telegram }}"><span class="fa-brands fa-discord"></span></a></li>
                </ul>
                
                </div>
            </div>
          
          <div class="col-xl-9 col-md-12">
            <div class="content-tab">
              <div class="content-inner">
                

                <div class="main">
                  <h6>Summary</h6>
                  <p>111111111111</p>
                </div>

                <div class="main">
                  <h6>Description</h6>
                  <p>22222222222</p>
                </div>

              </div>
            </div>
          </div>

        </div>
      </div>
    </section>


    <section class="blog">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="block-text">
              <h3 class="heading">Latest News</h3>
            </div>
          </div>

          @foreach ($posts as $post)
          <div class="col-md-4">
            <div class="blog-box">
              <div class="box-image">
              <img style="width: auto; height: 250px;" src="{{ Storage::disk('posts')->url($post->image) }}" alt="" />
              </div>
              <div class="box-content">
                <a href="/blog/{{ $post->slug }}" class="category btn-action">{{ $post->title }}</a>
                <br>
                <a href="/blog/{{ $post->slug }}" class="title">{{ $post->title }}</a>
                <div class="meta">
                  <a href="/blog/{{ $post->slug }}" class="time">{{ \Carbon\Carbon::parse($post->updated_at)->format('F j, Y, g:i a') }}</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          
          <div class="col-md-12">
            <div class="button-loadmore">
              <a href="/blog">All Posts</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    @include('includes.footer')
    <!-- End Footer -->

    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('js/switchmode.js') }}"></script>
    <script src="https://unpkg.com/boxicons@2.1.2/dist/boxicons.js"></script>

    <script>
        const exchangeSlug = @json($exchange->slug);
        const api_url = `https://api.coincap.io/v2/exchanges/${exchangeSlug}`;

        // Function to fetch data from the API
        async function fetchExchangeData() {
            const response = await fetch(api_url);
            const data = await response.json();

            // Display the fetched data in the HTML elements
            document.getElementById('rank').innerText = data.data.rank;
            document.getElementById('tradingPairs').innerText = data.data.tradingPairs;
            document.getElementById('volumeUsd').innerText = parseFloat(data.data.volumeUsd).toLocaleString('en-US', { style: 'currency', currency: 'USD' });
            document.getElementById('percentTotalVolume').innerText = parseFloat(data.data.percentTotalVolume).toFixed(2) + '%';
        }

        // Call the function to fetch and display data
        fetchExchangeData();
    </script>

  </body>
</html>
