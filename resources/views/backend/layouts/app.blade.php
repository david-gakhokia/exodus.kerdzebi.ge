<!DOCTYPE html>
<html lang="en">
<head>
<!-- BEGIN: Head-->
  @include('backend.sections.head')
<!-- END: Head-->
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
      <!-- Start: Navbar-->
      @include('backend.sections.navbar')
      <!-- END: Navbar-->
      </nav>
      <div class="main-sidebar sidebar-style-2">
      <!-- Start: Sidebar-->
      @include('backend.sections.sidebar')
      <!-- END: Sidebar-->
      @include('sweetalert::alert')
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">

          <div class="section-body">
            <!-- BEGIN: Content-->

                @yield('content')

            <!-- END: Content-->
          </div>
        </section>
      </div>
    <!-- BEGIN: Footer-->
        @include('backend.sections.footer')
    <!-- END: Footer-->
    </div>
  </div>
  <!-- BEGIN: JS-->
    @include('backend.sections.js')
  <!-- END: JS-->
</body>

</html>
