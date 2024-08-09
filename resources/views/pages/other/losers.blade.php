<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    @include('includes.head')
    <!-- end Head -->
  <body class="body header-fixed home-2">
    <!-- Header -->
    @include('includes.header')
    <!-- end Header -->

    @if (session('message'))
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
      <div class="alert alert-danger alert-dismissible fade show custom-alert" style=" max-width: 400px; margin: 20px auto; text-align: center; padding: 10px;">
          <strong>{{ session('message') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

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
                  <a href="{{ route('coins.home') }}"><li><h6 class="fs-16">Coins</h6></li></a>
                  <a href="{{ route('exchange.home') }}"><li class="active"><h6 class="fs-16">Exchanges</h6></li></a>
                </ul>
                <div class="content-tab">
                  <div class="content-inner">
                  <table class="table">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Change 24h</th>
                          <th scope="col">Price</th>
                          <th scope="col">Volume 24h</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody id="crypto-table-body">
                        <!-- JS DATA -->
                      </tbody>
                    </table>
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
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    

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


    <script>
        async function fetchCryptoData() {
            try {
                const response = await fetch('https://api.coincap.io/v2/assets?limit=1400');
                const data = await response.json();
                const assets = data.data;

                // Sort by changePercent24Hr to find top losers
                const sortedAssets = assets.sort((a, b) => parseFloat(a.changePercent24Hr) - parseFloat(b.changePercent24Hr));
                
                // Take top 15 losers
                const topLosers = sortedAssets.slice(0, 15);

                // Insert rows into the table
                const tableBody = document.getElementById('crypto-table-body');
                topLosers.forEach(asset => {
                    tableBody.innerHTML += createTableRow(asset);
                });
            } catch (error) {
                console.error('Error fetching crypto data:', error);
            }
        }

        function createTableRow(asset) {
            return `
                <tr>
                    <th scope="row"><span class="icon-star"></span></th>
                    <td> <img style="border-radius: 50%; width: 35px; height: 35px;" src="{{ Storage::disk('coins')->url('${asset.id}-logo.png') }}" onerror="this.onerror=null; this.src='{{ Storage::disk('coins')->url('base-logo.png') }}';" /> </td>
                    <td>
                        <a href="/coin/${asset.id}">
                            <span>${asset.name}</span>
                            <span class="unit">${asset.symbol}</span>
                        </a>
                    </td>
                    <td class="boild"><a href="/coin/${asset.id}" style="color:red;"><i class="fa-solid fa-caret-down"></i> &nbsp;&nbsp; ${parseFloat(asset.changePercent24Hr).toFixed(2)}%</a></td>
                    <td class="down"><a href="/coin/${asset.id}">$ ${parseFloat(asset.priceUsd).toFixed(4)}</a></td>
                    <td class="boild"><a href="/coin/${asset.id}">$ ${parseFloat(asset.volumeUsd24Hr).toFixed(2)}</a></td>
                    <td><a href="/coin/${asset.id}" class="btn">view</a></td>
                </tr>
            `;
        }

        fetchCryptoData();
    </script>

  </body>
</html>