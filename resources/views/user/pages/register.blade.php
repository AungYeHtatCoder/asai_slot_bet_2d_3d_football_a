@include('user.layouts.head')
@yield('style')

<body>
  <div class="main">
    <div class="">
      <div class="text-center">
        <img
          src="https://delightmyanmar.pro/user_app/assets/img/logo.png"
          alt=""
          style="width: 100px; height: 100px"
        />
      </div>
      <h5 class="text-center">အကောင့်အသစ်ဖွင့်ရန်</h5>
      <form action="">
        <input
          type="text"
          name="signin_name"
          class="form-control w-75 ps-3 my-3 mx-auto"
          placeholder="အမည်ထည့်ပါ"
        />
        <input
          type="text"
          name="signin_phone"
          class="form-control w-75 ps-3 my-3 mx-auto"
          placeholder="ဖုန်းနံပတ်ဖြည့်ပါ"
        />
        <input
          type="password"
          name="signin_password"
          class="form-control w-75 ps-3 my-3 mx-auto"
          placeholder="လျှို့ဝှက်နံပါတ်ဖြည့်ပါ"
        />
        <input
          type="password"
          name="signin_comfirm_password"
          class="form-control w-75 ps-3 my-3 mx-auto"
          placeholder="နောက်တစ်ခါ လျှို့ဝှက်နံပါတ်ဖြည့်ပါ"
        />

        <div class="d-flex justify-content-center align-items-center">
          <button
            type="button"
            name="signin_btn"
            class="btn-register w-75 mx-auto mt-4 border-0"
          >
            အကောင့်ပြုလုပ်ပါ
          </button>
        </div>
      </form>
    </div>
  </div>
</body>
@include('slot.layouts.js')
@yield('script')