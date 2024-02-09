@include('user.layouts.head')
@yield('style')

<body>
  <div class="main">
    <div class="">
      <div class="text-center mt-3">
        <img src="{{ asset('/admin_app/logo.png') }}" alt="" style="width: 120px; height: 100px" />
      </div>
      <h5 class="text-center mt-3">အကောင့်ဝင်ရန်</h5>
      <form action="{{ route('login') }}" method="post" class="p-5">
        @csrf
        <div class="mb-3">
          <label for="login" class="form-label">Email or Phone</label>
          <input type="text" name="phone" id="login" class="form-control" placeholder="Enter your email or phone">
          @error('phone')
          <div class="alert alert-danger">{{ "The phone field is required." }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <div class="input-group">
            <span class="input-group-text bg-white border border-0"><i class="fas fa-key text-purple"></i></span>
            <input type="password" name="password" id="password" class="form-control border border-0" placeholder="လျှို့ဝှက်နံပါတ်ထည့်ပါ">
            <span class="input-group-text bg-white border border-0"><i class="fas fa-eye text-purple" id="eye" onclick="PwdView()" style="cursor: pointer;"></i></span>
          </div>
          @error('password')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </div>

        <hr />

    </form>
  </div>
  </div>



</body>
@include('user.layouts.js')
@yield('script')
<script>
  function PwdView() {
    var x = document.getElementById("password");
    var y = document.getElementById("eye");

    if (x.type === "password") {
      x.type = "text";
      y.classList.remove('fa-eye');
      y.classList.add('fa-eye-slash');
    } else {
      x.type = "password";
      y.classList.remove('fa-eye-slash');
      y.classList.add('fa-eye');
    }
  }
</script>