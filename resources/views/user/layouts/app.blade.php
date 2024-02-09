@include('user.layouts.head')
@yield('style')

<body>
  <div class="main">
    <!-- NAVBAR START -->
    @include('user.layouts.navbar')
    <!-- NAVBAR END -->

    @yield('content')
    <!-- FOOTER START -->
    @include('user.layouts.footer')
    <!-- FOOTER END -->
  </div>

  <!-- SIDE BAR -->
  @include('user.layouts.sidebar')
  <!-- SIDE BAR -->

  <!-- TOP UP AND WITHDRAW -->
  @include('user.layouts.topup-model')
</body>
@include('user.layouts.js')
@yield('script')