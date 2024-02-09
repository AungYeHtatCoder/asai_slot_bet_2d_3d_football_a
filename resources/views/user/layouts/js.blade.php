<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    @if (Session::has('error'))
        <script>
            Toastify({
                text:"{{Session::get('error')}}",
                className:"bg-danger text-white",
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

<script>
//  $("#topup").click(function() {
//   $("#withdraw").removeClass("active");
//   $("#topup").addClass("active");

//   $(".topup").removeClass("d-none");
//   $(".withdraw").addClass("d-none");
//  });

//  $("#withdraw").click(function() {
//   $("#withdraw").addClass("active");
//   $("#topup").removeClass("active");

//   $(".withdraw").removeClass("d-none");
//   $(".topup").addClass("d-none");
//  });

 const banks = document.querySelectorAll(".bank");

 banks.forEach((bank) => {
  bank.addEventListener("click", function() {
   banks.forEach((other) => {
    other.classList.remove("active");
   });
   this.classList.add("active");
  });
 });
</script>

</html>