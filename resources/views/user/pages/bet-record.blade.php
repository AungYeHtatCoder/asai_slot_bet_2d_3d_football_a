@extends('user.layouts.app')

@section('content')
<div class="bet-record" style="margin-top: 60px; padding-top: 10px">
 <div class="d-flex justify-content-around align-items-center">
  <div></div>
  <h5>ဂိမ်းမှတ်တမ်း</h5>
  <div class="ms-3">
   <img src="{{ asset('slot_app/images/myanmarlogo.png') }}" alt="" style="width: 40px; height: 40px" />
   <span>MMK</span>
  </div>
 </div>

 <div class="p-3 mt-3">
  <p>အလောင်းအစားအရေအတွက်: <span>0</span></p>
 </div>

 <div class="bet-total p-3">
  <div class="d-flex justify-content-between mt-1">
   <p>စုစုပေါင်းဝင်ငွေး</p>
   <span>0.00 (MMK)</span>
  </div>
  <div class="d-flex justify-content-between mt-1">
   <p>စုစုပေါင်းကုန်ကျစရိတ်း</p>
   <span>0.00 (MMK)</span>
  </div>
 </div>

 <div class="bet-detail">
  <div class="d-flex justify-content-between align-items-center mt-2">
   <div class="d-flex align-items-center ms-2">
    <img src="{{ asset('slot_app/images/bet-record/jdb.png') }}" alt="" style="width: 50px; height: 50px" />
    <div class="ms-2">
     JDB စလော့ <br />
     လောင်းကြေးပမာဏ: <span>0.00</span>
    </div>
   </div>
   <div class="me-2">
    <p>
     0.00(MMK) <br />
     <span>0ကြိမ်</span>
    </p>
   </div>
  </div>

  <div class="d-flex justify-content-between align-items-center mt-2">
   <div class="d-flex align-items-center ms-2">
    <img src="{{ asset('slot_app/images/bet-record/jdb.png') }}" alt="" style="width: 50px; height: 50px" />
    <div class="ms-2">
     JDB စလော့ <br />
     လောင်းကြေးပမာဏ: <span>0.00</span>
    </div>
   </div>
   <div class="me-2">
    <p>
     0.00(MMK) <br />
     <span>0ကြိမ်</span>
    </p>
   </div>
  </div>

  <div class="d-flex justify-content-between align-items-center mt-2">
   <div class="d-flex align-items-center ms-2">
    <img src="{{ asset('slot_app/images/bet-record/jdb.png') }}" alt="" style="width: 50px; height: 50px" />
    <div class="ms-2">
     JDB စလော့ <br />
     လောင်းကြေးပမာဏ: <span>0.00</span>
    </div>
   </div>
   <div class="me-2">
    <p>
     0.00(MMK) <br />
     <span>0ကြိမ်</span>
    </p>
   </div>
  </div>
 </div>
</div>
@include('user.layouts.sub-footer')
@endsection