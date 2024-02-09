    <script src="{{ asset('user_app/assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://kit.fontawesome.com/b829c5162c.js" crossorigin="anonymous"></script>
    <script src="{{ asset('user_app/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user_app/assets/js/popper.js') }}"></script>
    <script src="{{ asset('user_app/assets/js/script.js') }}"></script>
    @yield('script')
    @if (Session::has('error'))
        <script>
            Toastify({
                text:"{{Session::get('error')}}",
                className:"text-white",
                style: {
                    background: "#ff0000",
                },
                position:'center'
            }).showToast();
        </script>
    @endif
    @if (Session::has('success'))
        <script>
            Toastify({
                text:"{{Session::get('success')}}",
                className:"text-white",
                style: {
                    background: "#38d100",
                },
                position:'center'
            }).showToast();
        </script>
    @endif
</body>
</html>
