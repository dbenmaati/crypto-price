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


    <section class="blog">
      <div class="container">
        <div class="row">


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
              @include('includes.pagination_posts')  
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
    <script src="{{ asset('js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('js/apexcharts.js') }}"></script>
    <script src="{{ asset('js/switchmode.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  </body>
</html>