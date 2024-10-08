<footer class="footer style-2 bg">
<!--
      <div class="container">
        <div class="footer__main">
          <div class="row">
            <div class="col-xl-4 col-md-6">
              <div class="info">
                <a href="index.html" class="logo">
                  <img src="assets/images/logo/log-footer.png" alt="" />
                </a>
                <h6>Let's talk! 🤙</h6>
                <ul class="list">
                  <li><p>+12 345 678 9101</p></li>
                  <li><p>Info.Avitex@Gmail.Com</p></li>
                  <li>
                    <p>
                      Cecilia Chapman 711-2880 Nulla St. Mankato Mississippi
                      96522
                    </p>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div style="text-align: center; padding-top: 46px;">
                <div class="widget-link">
                  <h6 class="title">LINKS</h6>
                  <ul>
                    <li><a href="spot.html">Spot</a></li>
                    <li><a href="#">Inverse Perpetual</a></li>
                    <li><a href="#">USDT Perpetual</a></li>
                    <li><a href="exchange.html">Exchange</a></li>
                    <li><a href="#">Launchpad</a></li>
                    <li><a href="#">Binance Pay</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-12">
              <div class="footer-contact">
                <h5>Newletters</h5>
                <p>
                  Subscribe our newsletter to get more free design course and
                  resource.
                </p>
                <form action="#">
                  <input
                    type="email"
                    placeholder="Enter your email"
                    required=""
                  />
                  <button type="submit" class="btn-action">Submit</button>
                </form>
                <ul class="list-social">
                  <li>
                    <a href="#"><span class="icon-facebook-f"></span></a>
                  </li>
                  <li>
                    <a href="#"><span class="icon-instagram"></span></a>
                  </li>
                  <li>
                    <a href="#"><span class="icon-youtube"></span></a>
                  </li>
                  <li>
                    <a href="#"><span class="icon-twitter"></span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
-->   
      <br>
      <div class="container">
        <div style="justify-content: space-between; align-items: center; text-align:center;">  
          <ul style="display: flex; justify-content: center; align-items: center; font-size: 1.7em; padding: 0; margin: 0;">
            @isset($settings->facebook)  @if($settings->facebook != 'NULL')<li><a style="font-size: 0.8em; margin-right: 15px;" href="{{ $settings->facebook }}"><span class="fa-brands fa-facebook-f"></span></a></li>@endif @endisset
            @isset($settings->instagram) @if($settings->instagram != 'NULL')<li><a style="font-size: 0.8em; margin-right: 15px;" href="{{ $settings->instagram }}"><span class="fa-brands fa-instagram"></span></a></li>@endif @endisset
            @isset($settings->twitter)   @if($settings->twitter != 'NULL')<li><a style="font-size: 0.8em; margin-right: 15px;" href="{{ $settings->twitter }}"><span class="fa-brands fa-twitter"></span></a></li>@endif @endisset
            @isset($settings->linkedin)  @if($settings->linkedin != 'NULL')<li><a style="font-size: 0.8em; margin-right: 15px;" href="{{ $settings->linkedin }}"><span class="fa-brands fa-linkedin"></span></a></li>@endif @endisset
            @isset($settings->telegram)  @if($settings->telegram != 'NULL')<li><a style="font-size: 0.8em; margin-right: 15px;" href="{{ $settings->telegram }}"><span class="fa-brands fa-telegram"></span></a></li>@endif @endisset
            @isset($settings->discord)   @if($settings->discord != 'NULL')<li><a style="font-size: 0.8em; margin-right: 15px;" href="{{ $settings->discord }}"><span class="fa-brands fa-discord"></span></a></li>@endif @endisset
            @isset($settings->reddit)    @if($settings->reddit != 'NULL')<li><a style="font-size: 0.8em; margin-right: 15px;" href="{{ $settings->reddit }}"><span class="fa-brands fa-reddit"></span></a></li>@endif @endisset
            @isset($settings->medium)    @if($settings->medium != 'NULL')<li><a style="font-size: 0.8em; margin-right: 15px;" href="{{ $settings->medium }}"><span class="fa-brands fa-medium"></span></a></li>@endif @endisset
            @isset($settings->youtube)   @if($settings->youtube != 'NULL')<li><a style="font-size: 0.8em; margin-right: 15px;" href="{{ $settings->youtube }}"><span class="fa-brands fa-youtube"></span></a></li>@endif @endisset
          </ul>
          <br>
          <p>
            @foreach ($pages as $index => $page)
              @if ($page->footer_menu_show)
                <a href="{{ $page->slug }}">{{ $page->page_name }}</a>
                @if (!$loop->last) - @endif
              @endif
            @endforeach
          </p>
          <br>
          <p>
            {{ $settings->footer }}
          </p>
          <br>
        </div>
      </div>
    </footer>
    
    @isset($settings->js_code)
        @if($settings->js_code != 'NULL')
            {{ $settings->js_code }}
        @endif
    @endisset
    