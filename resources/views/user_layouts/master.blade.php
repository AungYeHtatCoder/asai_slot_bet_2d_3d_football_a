@include('user_layouts.head')

<!-- main content -->
<div class="container-fluid" id="allBgColor">
    <div class="row">
        <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3 col-12" style="min-height: 100vh;" id="main">
            @yield('content')
        </div>
    </div>
</div>
<!-- main content -->

@include('user_layouts.script')
