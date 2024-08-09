<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    @include('includes.head')
    <!-- end Head -->
  <body class="body header-fixed home-2">
    <!-- Header -->
    @include('includes.header')
    <!-- end Header -->

    <!-- Banner Top -->
    <section class="banner">
      <div class="container">
          <div style="text-align: center;">
            <div class="banner__content">
              <h2 class="title">
                {{ $page->meta_title }}
              </h2>
              <p class="fs-20 desc">
                <?php echo nl2br($page->content); ?>
              </p>
            </div>
          </div>
      </div>
    </section>
    <!-- End Banner Top -->
    @if ($coins->onFirstPage())
    <section class="crypto" data-aos="fade-up" data-aos-duration="1000">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <h3 class="heading">Top Coins</h3>
            <div class="crypto__main">
                <div class="crypto-box">
                    <div class="left">
                    <div id="top-logo-0"></div>
                    <h6 id="top-name-0"> NA </h6> 
                    <h6 class="price" id="top-price-0"> NA </h6>
                    </div>
                    <div class="right">
                    <p id="top-change-0"> NA </p>
                    </div>
                </div>

                <div class="crypto-box">
                    <div class="left">
                    <div id="top-logo-1"></div>
                    <h6 id="top-name-1"> NA </h6> 
                    <h6 class="price" id="top-price-1"> NA </h6>
                    </div>
                    <div class="right">
                    <p id="top-change-1"> NA </p>
                    </div>
                </div>

                <div class="crypto-box">
                    <div class="left">
                    <div id="top-logo-2"></div>
                    <h6 id="top-name-2"> NA </h6> 
                    <h6 class="price" id="top-price-2"> NA </h6>
                    </div>
                    <div class="right">
                    <p id="top-change-2"> NA </p>
                    </div>
                </div>

                <div class="crypto-box">
                    <div class="left">
                    <div id="top-logo-3"></div>
                    <h6 id="top-name-3"> NA </h6> 
                    <h6 class="price" id="top-price-3"> NA </h6>
                    </div>
                    <div class="right">
                    <p id="top-change-3"> NA </p>
                    </div>
                </div>
               
            </div>
          </div>
        </div>
      </div>
    </section>

    <br><br><br>
    @endif

    <br><br><br>
    
    <section class="coin-list">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="block-text">
              <h3 class="heading">Market Update</h3>
            </div>

            <div class="coin-list__main">
              <div class="flat-tabs">
                <ul class="menu-tab">
                  <a href="{{ route('coins.home') }}"><li class="active"><h6 class="fs-16">Coins</h6></li></a>
                  <a href="{{ route('exchange.home') }}"><li><h6 class="fs-16">Exchanges</h6></li></a>
                </ul>
                <div class="content-tab">
                  <div class="content-inner">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Last Price</th>
                          <th scope="col">24h %</th>
                          <th scope="col">Market Cap</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($coins as $coin)
                            <tr>
                              <th scope="row"><span class="icon-star"></span></th>
                              <td><img style="border-radius: 50%; width: 35px; height: 35px;" src="{{ Storage::disk('coins')->url($coin->logo) }}" class="coin-icon" alt="{{ $coin->name }}" /></td>
                              <td>
                                <a href="/coin/{{ $coin->slug }}">
                                  <span>{{ $coin->name }}</span>
                                  <span class="unit">{{ $coin->symbol }}</span>
                                </a>
                              </td>
                              <td class="boild"><a id="{{ $coin->slug }}-price" href="/coin/{{ $coin->slug }}">-</a></td>
                              <td class="up">   <a id="{{ $coin->slug }}-priceChange1d" href="/coin/{{ $coin->slug }}">-</a></td>
                              <td class="boild"><a id="{{ $coin->slug }}-marketCap" href="/coin/{{ $coin->slug }}">-</a></td>
                              <td><a href="/coin/{{ $coin->slug }}" class="btn">view</a></td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- Pagination -->
              @include('includes.pagination_coins')        
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
    <!-- <script src="{{ asset('js/Chart.bundle.min.js') }}"></script> -->
    <!-- <script src="{{ asset('js/apexcharts.js') }}"></script> -->
    <script src="{{ asset('js/switchmode.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    

    <script src="{{ asset('js/chart.js') }}"></script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView: 3,
        freeMode: true,
        watchSlidesProgress: true,
      });
      var swiper2 = new Swiper(".mySwiper2", {
        spaceBetween: 10,

        thumbs: {
          swiper: swiper,
        },
      });

      var swiper3 = new Swiper(".swiper-partner", {
        breakpoints: {
          0: {
            slidesPerView: 2,
            spaceBetween: 30,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 30,
          },
          1024: {
            slidesPerView: 4,
            spaceBetween: 60,
          },
        },
        slidesPerView: 4,
      });
    </script>


    <script src="{{ asset('js/crypto-functions.js') }}"></script>
    <script>
        // Get All Coins Data For Table From Api
        var jsonData = @json($coins);
            let coins_to_get = '';
            for (let i = 0; i < jsonData.data.length; i++) {
            coins_to_get = coins_to_get + jsonData.data[i].slug + ','
            }

            const apiUrl = 'https://api.coincap.io/v2/assets?ids=' + coins_to_get;
            fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                CoinsDataDisplay(data);
                
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });

        // Get Top Coins Data From Api
            const apiUrl2 = 'https://api.coincap.io/v2/assets?limit=4';
            fetch(apiUrl2)
            .then(response => {
                if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log(data);
                TopCoinsDataDisplay(data);
                
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    </script>
  </body>
</html>
