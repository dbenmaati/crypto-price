<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    @php use Illuminate\Support\Str; @endphp
    @if(isset($coin))<title>{{ $settings->site_title }} | {{ $coin->name }}</title>@endif
    @if(isset($coin))<meta name="description" content="{{ Str::limit($coin->description, 180) }}">@endif

    <meta name="keywords" content="crypto, cryptocurrency, bitcoin, coins">
    <meta name="author" content="{{ $settings->site_title }}">
    <meta name="robots" content="index, follow">

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
            <h3 class="heading" style="text-align:center;">{{ $coin->name }} Price & Coin Info</h3>
            <ul class="breadcrumb" style="justify-content: center;">
              <li><a style="font-size: 0.8em" href="{{ route('coins.home') }}">Home</a></li>
              <li><span style="font-size: 0.8em" class="fs-18">-></span></li>
              <li><a style="font-size: 0.8em" href="{{ route('coins.home') }}">Coins</a></li>
              <li><span style="font-size: 0.8em" class="fs-18">-></span></li>
              <li><span style="font-size: 0.8em" class="fs-18">{{ $coin->name }}</span></li>
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
                <img src="{{ Storage::disk('coins')->url($coin->logo) }}" alt="Round Image" style="border-radius: 50%; width: 45px; height: 45px;">
                <h6 style="margin: 0 0 0 10px;">{{ $coin->name }}
                  <span style="font-size: 0.5em;">({{ $coin->symbol }})</span>
                </h6>
              </div>
              <ul class="list">
                <li>
                  <div class="content">
                    <p>Name</p>
                    <h6 class="price">{{ $coin->name }}</h6>
                  </div>
                </li>
                <li>
                  <div class="content">
                    <p>Symbol</p>
                    <h6 class="price">{{ $coin->symbol }}</h6>
                  </div>
                </li>
              </ul>
              <br>
              
              @isset($coin->website)
              <div class="button-loadmore">
                <a style="width: 100%; border: 2px solid orange;" href="{{ $coin->website }}">Website</a>
              </div>
              @endisset

              @isset($coin->whitepaper)
              <div class="button-loadmore">
                <a style="width: 100%; border: 2px solid orange;" href="{{ $coin->whitepaper }}">Whitepaper</a>
              </div>
              @endisset

              @isset($coin->explorer)
              <div class="button-loadmore">
                <a style="width: 100%; border: 2px solid orange;" href="{{ $coin->explorer }}">Explorer</a>
              </div>
              @endisset
              
              <br><hr><br>
              <ul>

                <li>
                  <div class="content">
                    <p>Price</p><h6 style="font-size: 14px; display: inline;" class="price" id="PriceUsd"><span id="PriceUsdPrimary"></span></h6>&nbsp;&nbsp;
                    <span style="font-size: 0.8em; display: inline;" id="changePercent24Hr"> </span>
                  </div>
                </li>
                <li><div class="content"><p>Marketcap</p><h6 style="font-size: 14px;" class="price" id="MarketCapUsd">-</h6></div></li>
                <li><div class="content"><p>Volume 24h</p><h6 style="font-size: 14px;" class="price" id="volumeUsd24Hr">-</h6></div></li>
                <li><div class="content"><p>Supply</p><h6 style="font-size: 14px;" class="price" id="supplyid">-</h6></div></li>
                <li><div class="content"><p>Max Supply</p><h6 style="font-size: 14px;" class="price" id="maxSupplyid">-</h6></div></li>
              </ul>
              <br>
              <hr>
              <ul style="display: flex; justify-content: center; align-items: center; font-size: 1.7em; padding: 0; margin: 0;">
                @isset($coin->twitter)<li><a style="font-size: 0.8em; margin-right: 15px;" href="{{ $coin->twitter }}"><span class="fa-brands fa-twitter"></span></a></li>@endisset
                @isset($coin->telegram)<li><a style="font-size: 0.8em; margin-right: 15px;" href="{{ $coin->telegram }}"><span class="fa-brands fa-telegram"></span></a></li>@endisset
                @isset($coin->discord)<li><a style="font-size: 0.8em; margin-right: 15px;" href="{{ $coin->discord }}"><span class="fa-brands fa-discord"></span></a></li>@endisset
              </ul>
              
            </div>
          </div>

          <div class="col-xl-9 col-md-12">
            <div class="content-tab">
              <div class="content-inner">

                <div class="main">
                <style>
                    #chart {
                      max-width: 100%;
                      margin: 35px auto;
                    }
                    .chart-btn {min-width: 55px; padding: 4px 10px; background: #99999900; border-radius: 30px; display: inline-block; position: relative; overflow: hidden; border:solid #707070;}
                    .active {background: orange;}
                  </style>
                  <div class="jsx-367480488 chart-options direction-rtl">
                    <div class="jsx-2875478159 chart-types">
                      <button id="api_1d" class="chart-btn interval-item active">1D</button>
                      <button id="api_1w" class="chart-btn interval-item ">1W</button>
                      <button id="api_1m" class="chart-btn interval-item ">1M</button>
                      <button id="api_1y" class="chart-btn interval-item ">1Y</button>
                      <button id="api_3y" class="chart-btn interval-item ">All</button>
                    </div>
                  </div>
                  <div class="jsx-1699593545 chart-content-container ">
                    <div class="line-chart-container">
                      <div id="chart"></div>
                    </div>
                  </div>
                </div>

                <div class="main">
                  <h6>Summary</h6>
                  <p id="coin-description"></p>
                  <div class="button"></div>
                </div>

                @isset($coin->description)
                  @if($coin->description != 'NULL')
                    <div class="main">
                      <h6>Description</h6>
                      <p>{{ $coin->description }}</p>
                      <div class="button"></div>
                    </div>
                  @endif
                @endisset

                <div class="main">
                  <h6>{{ $coin->symbol }} To USD Converter</h6>
                  <div class="form">
                    <div class="form-field">
                      <label>{{ $coin->symbol }}</label>
                      <input id="coinInput" type="number" class="dollar" placeholder="{{ $coin->symbol }}" />
                    </div>
                    <button class="btn-convert">
                      <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.6691 3.02447L15.4471 0.35791C15.3074 0.195998 15.1203 0.106407 14.9261 0.108432C14.7319 0.110457 14.5461 0.203937 14.4088 0.368737C14.2715 0.533538 14.1936 0.756473 14.1919 0.989527C14.1902 1.22258 14.2649 1.44711 14.3998 1.61475L15.3575 2.76403H2.3319C1.74258 2.76403 1.1774 3.04497 0.760683 3.54505C0.34397 4.04512 0.109863 4.72337 0.109863 5.43059L0.109863 8.09714C0.109863 8.33288 0.187899 8.55896 0.326803 8.72566C0.465707 8.89235 0.654102 8.986 0.850542 8.986C1.04698 8.986 1.23538 8.89235 1.37428 8.72566C1.51319 8.55896 1.59122 8.33288 1.59122 8.09714V5.43059C1.59122 5.19485 1.66926 4.96877 1.80816 4.80207C1.94707 4.63538 2.13546 4.54174 2.3319 4.54174H15.3575L14.3998 5.69102C14.329 5.77302 14.2726 5.8711 14.2338 5.97954C14.195 6.08798 14.1745 6.20462 14.1737 6.32264C14.1728 6.44066 14.1916 6.5577 14.2288 6.66694C14.2661 6.77618 14.3211 6.87542 14.3906 6.95888C14.4601 7.04233 14.5428 7.10833 14.6339 7.15302C14.7249 7.19772 14.8224 7.22021 14.9208 7.21918C15.0191 7.21816 15.1163 7.19363 15.2067 7.14705C15.297 7.10047 15.3788 7.03275 15.4471 6.94786L17.6691 4.2813C17.8052 4.11283 17.8812 3.88746 17.8812 3.65288C17.8812 3.41831 17.8052 3.19293 17.6691 3.02447Z" fill="white" />
                        <path d="M17.1467 8.98828C16.9503 8.98828 16.7619 9.08193 16.623 9.24862C16.4841 9.41531 16.406 9.64139 16.406 9.87713V12.5437C16.406 12.7794 16.328 13.0055 16.1891 13.1722C16.0502 13.3389 15.8618 13.4325 15.6653 13.4325H2.63976L3.59746 12.2832C3.73238 12.1156 3.80704 11.8911 3.80535 11.658C3.80366 11.425 3.72576 11.202 3.58844 11.0372C3.45111 10.8724 3.26534 10.779 3.07113 10.7769C2.87693 10.7749 2.68983 10.8645 2.55014 11.0264L0.328098 13.693C0.191902 13.8613 0.115723 14.0867 0.115723 14.3214C0.115723 14.556 0.191902 14.7814 0.328098 14.9498L2.55014 17.6164C2.61846 17.7012 2.70019 17.769 2.79056 17.8155C2.88092 17.8621 2.97812 17.8866 3.07646 17.8877C3.17481 17.8887 3.27234 17.8662 3.36337 17.8215C3.4544 17.7768 3.53709 17.7108 3.60664 17.6274C3.67618 17.5439 3.73118 17.4447 3.76842 17.3354C3.80567 17.2262 3.82441 17.1092 3.82355 16.9911C3.8227 16.8731 3.80226 16.7565 3.76345 16.648C3.72463 16.5396 3.6682 16.4415 3.59746 16.3595L2.63976 15.2102H15.6653C16.2547 15.2102 16.8199 14.9293 17.2366 14.4292C17.6533 13.9291 17.8874 13.2509 17.8874 12.5437V9.87713C17.8874 9.64139 17.8094 9.41531 17.6704 9.24862C17.5315 9.08193 17.3431 8.98828 17.1467 8.98828Z" fill="white" />
                      </svg>
                    </button>
                    <div class="form-field s1">
                      <label>US$</label>
                      <input id="dollarInput" type="txt" class="dollar" placeholder="US$"/>
                    </div>
                  </div>
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
          
          @if(empty($posts))
            <h6 style="text-align:center;"> NO POSTS YET</h6><br><br>
          @else
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
          @endif
          
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

    <!--------------------------------- PRICE CHART ---------------------------------------->
    <script src='https://cdn.jsdelivr.net/npm/apexcharts'></script>
    <script src="{{ asset('js/crypto-ticker.js') }}" coin-slug="{{ $coin->slug }}"></script>
    <!--------------------------------- END PRICE CHART ---------------------------------------->

  </body>
</html>
