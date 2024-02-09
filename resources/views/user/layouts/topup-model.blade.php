 <div class="modal fade" id="topupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header text-white">
     <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      {{-- deposit code start --}}
      <div class="topup my-3">
        <div class="topuptypes">
        <h4 class="text-white mb-5">ငွေပေးချေမှုအမျိုးအစားများ</h4>
        <div class="d-flex justify-content-around mt-2 mb-5">
          <div class="bank ck text-center w-100 active pt-3" >
            <label for="kpay">
              <img src="{{ asset('slot_app/images/bank/kpay.png') }}" alt="" />
              <p class="text-center">K Pay</p>
            </label>
          </div>
          <div class="bank cb text-center w-100 ms-1 pt-3">
            <label for="cpay">
              <img src="{{ asset('slot_app/images/bank/cbpay.png') }}" alt="" />
              <p class="text-center">CB Pay</p>
            </label>
          </div>
          <div class="bank text-center w-100 ms-1 pt-3">
            <label for="wpay">
              <img src="{{ asset('slot_app/images/bank/wpay.png') }}" alt="" />
              <p class="text-center">Wave Pay</p>
            </label>
          </div>
          <div class="bank text-center w-100 ms-1 pt-3">
            <label for="apay">
              <img src="{{ asset('slot_app/images/bank/aya_logo.png') }}" alt="" />
              <p class="text-center">Aya Pay</p>
            </label>
          </div>
        </div>
        </div>

        <div class="mt-2">
        <form action="{{ route('deposit') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="d-none">
            <input type="radio" checked name="payment_method" value="KBZ Pay" id="kpay">
            <input type="radio" name="payment_method" value="CB Pay" id="cpay">
            <input type="radio" name="payment_method" value="Wave Pay" id="wpay">
            <input type="radio" name="payment_method" value="AYA Pay" id="apay">
          </div>

          <div class="mb-3">
          <label for="amount" class="form-label text-white fw-bold">သွင်းငွေပမာဏ</label>
          <input type="number" class="form-control input" name="amount" id="amount" autocomplete="off" />
          </div>
          <div class="mb-3">
            <label for="amount" class="form-label text-white fw-bold">နောက်ဆုံးဂဏန်း၆လုံး</label>
            <input type="number" class="form-control input" name="last_6_num" id="amount" autocomplete="off" />
          </div>
          <div class="mb-3">
            <label for="amount1" class="form-label text-white fw-bold">ငွေလွှဲမိတ္တူ</label>
            <input type="file" class="form-control input" name="receipt" id="amount1" autocomplete="off" />
          </div>
          <div class="mb-3">
          <label for="phone" class="form-label text-white fw-bold">ငွေသွင်းသူဖုန်းနံပါတ်</label>
          <input type="number" class="form-control input" id="phone" name="phone" autocomplete="off" />
          </div>
          <div class="modal-footer">
            <button class="btn-login">ငွေသွင်းရန်</button>
          </div>
        </form>
        </div>
      </div>
      {{-- deposit code end --}}
    </div>
    
   </div>
  </div>
 </div>

 <div class="modal fade" id="withdrawModal">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header text-white">
     <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
      {{-- withdraw code start --}}
      <div class="my-3 withdraw">
        <div class="topuptypes">
        <h4 class="text-white mb-5">ငွေပေးချေမှုအမျိုးအစားများ</h4>
        <div class="d-flex justify-content-around mt-2 mb-5">
          <div class="bank ck text-center w-100 active pt-3" >
            <label for="kpay1">
              <img src="{{ asset('slot_app/images/bank/kpay.png') }}" alt="" />
              <p class="text-center">K Pay</p>
            </label>
          </div>
          <div class="bank cb text-center w-100 ms-1 pt-3">
            <label for="cpay1">
              <img src="{{ asset('slot_app/images/bank/cbpay.png') }}" alt="" />
              <p class="text-center">CB Pay</p>
            </label>
          </div>
          <div class="bank text-center w-100 ms-1 pt-3">
            <label for="wpay1">
              <img src="{{ asset('slot_app/images/bank/wpay.png') }}" alt="" />
              <p class="text-center">Wave Pay</p>
            </label>
          </div>
          <div class="bank text-center w-100 ms-1 pt-3">
            <label for="apay1">
              <img src="{{ asset('slot_app/images/bank/aya_logo.png') }}" alt="" />
              <p class="text-center">Aya Pay</p>
            </label>
          </div>
        </div>
        </div>

        <div class="mt-2">
        <form action="{{ route('withdraw') }}" method="POST">
          @csrf
          <div class="d-none">
            <input type="radio" checked name="payment_method" value="KBZ Pay" id="kpay1">
            <input type="radio" name="payment_method" value="CB Pay" id="cpay1">
            <input type="radio" name="payment_method" value="Wave Pay" id="wpay1">
            <input type="radio" name="payment_method" value="AYA Pay" id="apay1">
          </div>
          <div class="mb-3">
          <label for="amount" class="form-label text-white fw-bold">ထုတ်ငွေပမာဏ</label>
          <input type="number" class="form-control input" name="amount" id="amount" autocomplete="off" />
          </div>
          <div class="mb-3">
          <label for="phone" class="form-label text-white fw-bold">ငွေထုတ်သူဖုန်းနံပါတ်</label>
          <input type="number" class="form-control input" name="phone" id="phone" autocomplete="off" />
          </div>
          <div class="text-end">
            <button type="submit" class="btn-login">ငွေထုတ်ရန်</button>
          </div>
        </form>
        </div>
      </div>
      {{-- withdraw code end --}}
    </div>
    
   </div>
  </div>
 </div>