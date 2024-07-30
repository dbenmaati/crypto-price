<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    @include('includes.head')
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
            <h3 class="heading" style="text-align:center;">Latest News</h3>
            <ul class="breadcrumb" style="justify-content: center;">
              <li><a style="font-size: 0.8em" href="{{ route('coins.home') }}">Home</a></li>
              <li><span style="font-size: 0.8em" class="fs-18">-></span></li>
              <li><span style="font-size: 0.8em" class="fs-18">Blog</span></li>
            </ul>
          </div>

        </div>
      </div>
    </section>
    <!-- End PageTitle -->

    <br><br><br>


    <section class="blog">
      <div class="container">
        <div class="row">

          <h1>hiiiiiiiiii</h1>
         
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