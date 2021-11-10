<!DOCTYPE html>
<html dir="ltr" lang="en">

  <head>
        @include('frontend.sections.head')
  </head>
  <body>
    <div class="wrapper">
      <div class="preloader"></div>

      <!-- Main Header Nav -->
      <header>
        <section >
          @include('frontend.sections.header')
        </section>
      </header>



      <!-- Main Header Nav For Mobile -->
        {{-- @include('frontend.sections.mobile-menu') --}}
      <!-- End Main Header Nav For Mobile -->


    <!--  START Main AREA -->
        @yield('content')
    <!--  End Main AREA -->

      <!-- Footer Area -->
      @include('frontend.sections.footer')
      <!-- End Footer Area -->


    </div>
    <!-- Wrapper End -->

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg>
    </div>

    <!-- JS Files -->
        @include('frontend.sections.js')
    <!--// JS Files -->
  </body>
</html>
