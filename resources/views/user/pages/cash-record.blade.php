@extends('user.layouts.app')

@section('content')
<div class="bet-record" style="margin-top: 60px; padding-top: 10px">
 <div class="d-flex justify-content-around align-items-center">
  <div></div>
  <h5>‌‌ငွေစာရင်းမှတ်တမ်း</h5>
  <div class="ms-3">
   <img src="{{ asset('slot_app/images/myanmarlogo.png') }}" alt="" style="width: 40px; height: 40px" />
   <span>MMK</span>
  </div>
 </div>

 <!-- <div class="p-3 mt-3">
          <p>အလောင်းအစားအရေအတွက်: <span>0</span></p>
        </div> -->

 <div class="cash-total p-3">
  <div class="d-flex justify-content-between">
   <p>စုစုပေါင်းဝင်ငွေး</p>
   <span>0.00 (MMK)</span>
  </div>
  <div class="d-flex justify-content-between">
   <p>စုစုပေါင်းကုန်ကျစရိတ်း</p>
   <span>0.00 (MMK)</span>
  </div>
 </div>

 <div class="cash-detail text-center">
  <img src="{{ asset('slot_app/images/no-data.png') }}" alt="" />
  <p>‌‌ဒေတာမရှိပါ။</p>
 </div>
</div>
@include('user.layouts.sub-footer')
@endsection