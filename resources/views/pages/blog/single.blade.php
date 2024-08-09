<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @php use Illuminate\Support\Str; @endphp
    @if(isset($post))<title>{{ $settings->site_title }} | {{ $post->title }}</title>@endif
    @if(isset($post))<meta name="description" content="{{ Str::limit($post->content, 180) }}">@endif

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
            <h3 class="heading" style="text-align:center;">Blog Post</h3>
            <ul class="breadcrumb" style="justify-content: center;">
              <li><a style="font-size: 0.8em" href="{{ route('coins.home') }}">Home</a></li>
              <li><span style="font-size: 0.8em" class="fs-18">-></span></li>
              <li><a style="font-size: 0.8em" href="{{ route('blog.home') }}">Blog</a></li>
              <li><span style="font-size: 0.8em" class="fs-18">-></span></li>
              <li><span style="font-size: 0.8em" class="fs-18">{{ $post->title }}</span></li>
            </ul>
          </div>

        </div>
      </div>
    </section>
    <!-- End PageTitle -->

    
    <section class="blog-details">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 col-md-12">
            <div class="blog-main">
              <h3 class="title">
                {{ $post->title }}
              </h3>

              <div class="meta">
                <a href="#" class="category btn-action">learn & earn</a>

                <div class="meta-info">
                  <a href="#" class="time">{{ \Carbon\Carbon::parse($post->updated_at)->format('F j, Y, g:i a') }}</a>
                </div>
              </div>
              <div class="content">

                <!-- CONTENT -->
                <?php echo nl2br($post->content); ?>

              </div>

              <div class="details-bottom">
                <div class="tags">
                  <h6>Tags:</h6>
                  <ul>
                    <li><a href="blog-grid-v1.html">Metaverse</a></li>
                    <li><a href="blog-grid-v1.html">NFT Marketplace</a></li>
                    <li><a href="blog-grid-v1.html">Virtual Land</a></li>
                  </ul>
                </div>
                <div class="share">
                  <h6>Share:</h6>
                  <ul>
                    <li>
                      <a href="#" onclick="shareToFacebook()"><i class="fa-brands fa-facebook-f"></i></a>
                    </li>
                    <li>
                      <a href="#" onclick="shareToTwitter()"><i class="fa-brands fa-twitter"></i></a>
                    </li>
                  </ul>
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

    <script>
      function shareToFacebook() {
        const url = encodeURIComponent(window.location.href);
        const shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${url}`;
        window.open(shareUrl, '_blank', 'width=600,height=400');
      }

      function shareToTwitter() {
        const url = encodeURIComponent(window.location.href);
        const text = encodeURIComponent(document.title);
        const shareUrl = `https://twitter.com/intent/tweet?url=${url}&text=${text}`;
        window.open(shareUrl, '_blank', 'width=600,height=400');
      }
    </script>


  </body>
</html>
