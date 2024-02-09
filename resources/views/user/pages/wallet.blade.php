@extends('user.layouts.app')

@section('style')
<style>
  .input:focus{
    background: #000;
    color: #fff
  }
  .input{
    color: #fff;
  }
</style>
@endsection

@section('content')
{{-- to do --}}
<div class="wallet-content" style="margin: 60px 0 120px 0; padding-top: 10px">
 <div class="wallet-top">
  <div class="wallet-top-content p-4">
   <div class="currency">
    <img src="{{ asset('slot_app/images/myanmarlogo.png') }}" alt="" style="width: 40px; height: 40px" />
   </div>
   <div class="currency-balance mt-3 ms-1">
    {{-- <span class="ms-2">{{ $amount }}</span> --}}
   </div>
  </div>
  <div class="d-flex justify-content-around my-5">
   <a href="#topupModal" role="button" data-bs-toggle="modal" class="d-flex flex-column align-items-center text-decoration-none text-white">
    <svg width="40" height="40" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" color="#340057">
     <g id="icon/ä¸ªäººä¸&shy;å¿ƒ/å……å€¼1">
      <g id="ç¼–ç»„ 3">
       <path id="è·¯å¾„" d="M25.8095 18.5232C25.8095 20.8213 23.9462 22.6842 21.6476 22.6842H9.1619C6.86335 22.6842 5 20.8213 5 18.5232V9.16099C5 6.86294 6.86335 5 9.1619 5H21.6476C23.9462 5 25.8095 6.86294 25.8095 9.16099V11.1378V11.1378" stroke="currentColor" stroke-width="1.10526"></path>
       <g id="ç¼–ç»„">
        <path id="è·¯å¾„_2" fill-rule="evenodd" clip-rule="evenodd" d="M28 13.8421V23.3947C28 24.8336 26.8354 26 25.3988 26H9.79167C8.35507 26 7.19048 24.8336 7.19048 23.3947V13.8421H28Z" fill="currentColor"></path>
        <path id="è·¯å¾„_3" fill-rule="evenodd" clip-rule="evenodd" d="M25.3988 8.3158C26.8354 8.3158 28 9.42919 28 10.8026V11.6316H7.19048V10.8026C7.19048 9.42919 8.35507 8.3158 9.79167 8.3158H25.3988Z" fill="#ff9b20"></path>
       </g>
       <g id="ç¼–ç»„ 2">
        <path id="çŸ©å½¢" fill-rule="evenodd" clip-rule="evenodd" d="M21.1042 23.0829C20.4129 22.3852 20.9071 21.1997 21.8893 21.1997H25.3488C26.331 21.1997 26.8252 22.3852 26.1338 23.0829L24.4041 24.8285C23.9717 25.2648 23.2664 25.2648 22.834 24.8285L21.1042 23.0829Z" fill="white"></path>
        <rect id="çŸ©å½¢_2" x="22.5238" y="17.1579" width="2.19048" height="5.52632" rx="1.09524" fill="white"></rect>
       </g>
      </g>
     </g>
     <defs>
      <linearGradient id="paint0_linear_1154_32914" x1="7.19048" y1="13.8421" x2="7.19048" y2="26" gradientUnits="userSpaceOnUse">
       <stop stop-color="#00C979"></stop>
       <stop offset="1" stop-color="currentColor"></stop>
      </linearGradient>
     </defs>
    </svg>
    <span class="text-center">ငွေသွင်းရန်</span>
   </a>
   <a href="#withdrawModal" role="button" data-bs-toggle="modal" class="d-flex flex-column align-items-center text-decoration-none text-white">
    <svg width="40" height="40" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" color="#340057">
     <g id="icon/ä¸ªäººä¸&shy;å¿ƒ/æçŽ°1">
      <g id="ç¼–ç»„ 3">
       <path id="è·¯å¾„" d="M25.8095 18.5232C25.8095 20.8213 23.9462 22.6842 21.6476 22.6842H9.1619C6.86335 22.6842 5 20.8213 5 18.5232V9.16099C5 6.86294 6.86335 5 9.1619 5H21.6476C23.9462 5 25.8095 6.86294 25.8095 9.16099V11.1378V11.1378" stroke="currentColor" stroke-width="1.10526"></path>
       <g id="ç¼–ç»„">
        <path id="è·¯å¾„_2" fill-rule="evenodd" clip-rule="evenodd" d="M28 13.8421V23.3947C28 24.8336 26.8354 26 25.3988 26H9.79167C8.35507 26 7.19048 24.8336 7.19048 23.3947V13.8421H28Z" fill="currentColor"></path>
        <path id="è·¯å¾„_3" fill-rule="evenodd" clip-rule="evenodd" d="M25.3988 8.3158C26.8354 8.3158 28 9.42919 28 10.8026V11.6316H7.19048V10.8026C7.19048 9.42919 8.35507 8.3158 9.79167 8.3158H25.3988Z" fill="#ff9b20"></path>
       </g>
       <g id="ç¼–ç»„ 2">
        <path id="çŸ©å½¢" fill-rule="evenodd" clip-rule="evenodd" d="M21.1042 19.6957C20.4129 20.3934 20.9071 21.5789 21.8893 21.5789H25.3488C26.331 21.5789 26.8252 20.3934 26.1338 19.6957L24.4041 17.9502C23.9717 17.5138 23.2664 17.5138 22.834 17.9502L21.1042 19.6957Z" fill="white"></path>
        <rect id="çŸ©å½¢_2" width="2.19048" height="5.52632" rx="1.09524" transform="matrix(1 0 0 -1 22.5238 25.6207)" fill="white"></rect>
       </g>
      </g>
     </g>
     <defs>
      <linearGradient id="paint0_linear_1154_32940" x1="7.19048" y1="13.8421" x2="7.19048" y2="26" gradientUnits="userSpaceOnUse">
       <stop stop-color="#00C979"></stop>
       <stop offset="1" stop-color="currentColor"></stop>
      </linearGradient>
     </defs>
    </svg>
    <span>ငွေထုတ်ရန်</span>
   </a>
   {{-- <a href="#" class="d-flex flex-column align-items-center text-decoration-none text-white">
    <svg width="40" height="40" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg" color="#340057" border="1px solid white">
     <g>
      <g>
       <path fill-rule="evenodd" clip-rule="evenodd" d="M9.46748 4C7.65283 4 6.18176 5.47107 6.18176 7.28572L6.85309 7.28571C8.2898 7.28571 9.45449 8.45502 9.45449 9.89744C9.45449 11.1117 8.62917 12.1323 7.51101 12.4249C8.62917 12.7175 9.45449 13.7382 9.45449 14.9524C9.45449 16.1666 8.62917 17.1873 7.51101 17.4799C8.62917 17.7724 9.45449 18.7931 9.45449 20.0073C9.45449 21.4497 8.2898 22.619 6.85309 22.619H6.18176V23.7143C6.18176 25.5289 7.65283 27 9.46748 27H20.3506C22.1652 27 23.6363 25.5289 23.6363 23.7143V7.28571C23.6363 5.47106 22.1652 4 20.3506 4H9.46748ZM6.18176 21.5238H6.85309C7.68731 21.5238 8.36358 20.8449 8.36358 20.0073C8.36358 19.1698 7.68731 18.4908 6.85309 18.4908H6.18176V21.5238ZM6.18176 13.4359V16.4689H6.85309C7.68731 16.4689 8.36358 15.7899 8.36358 14.9524C8.36358 14.1149 7.68731 13.4359 6.85309 13.4359H6.18176ZM6.18176 11.4139H6.85309C7.68731 11.4139 8.36358 10.735 8.36358 9.89744C8.36358 9.05991 7.68731 8.38095 6.85309 8.38095H6.18176V11.4139Z" fill="url(#paint0_linear_1699_122456)"></path>
       <rect x="3.45238" y="7.83324" width="5.45887" height="4.12821" rx="2.0641" fill="#FF9B20" stroke="white" stroke-width="1.09524"></rect>
       <rect x="3.45238" y="12.8882" width="5.45887" height="4.12821" rx="2.0641" fill="#FF9B20" stroke="white" stroke-width="1.09524"></rect>
       <rect x="3.45238" y="17.9431" width="5.45887" height="4.12821" rx="2.0641" fill="#FF9B20" stroke="white" stroke-width="1.09524"></rect>
      </g>
      <path id="Vector" d="M16.0001 9.85C14.7736 9.85 13.5025 10.0617 12.5322 10.4754C11.5723 10.8846 10.85 11.5193 10.85 12.3913V17.3043C10.85 18.1182 11.4838 18.8316 12.4124 19.3322C13.3488 19.837 14.624 20.15 16.0001 20.15C17.3759 20.15 18.6511 19.837 19.5874 19.3322C20.5161 18.8316 21.15 18.1182 21.15 17.3043V12.3913C21.15 11.5193 20.4276 10.8846 19.4677 10.4754C18.4973 10.0617 17.2262 9.85 16.0001 9.85ZM16.0001 11.02C17.2748 11.02 18.2961 11.2389 18.9935 11.5308C19.3427 11.677 19.6051 11.8391 19.7775 11.9964C19.9537 12.1571 20.0167 12.2943 20.0167 12.3913C20.0167 12.4884 19.9536 12.6257 19.7775 12.7864C19.6051 12.9438 19.3427 13.106 18.9935 13.2522C18.2961 13.5441 17.2748 13.763 16.0001 13.763C14.7253 13.763 13.7039 13.5441 13.0066 13.2522C12.6573 13.106 12.3949 12.9438 12.2225 12.7864C12.0464 12.6257 11.9833 12.4884 11.9833 12.3913C11.9833 12.2943 12.0463 12.1571 12.2225 11.9964C12.3949 11.8391 12.6573 11.677 13.0066 11.5308C13.7039 11.2389 14.7253 11.02 16.0001 11.02ZM16.0001 18.9809C14.7686 18.9809 13.7503 18.7104 13.0446 18.3561C12.6914 18.1787 12.4209 17.9826 12.2409 17.7931C12.058 17.6004 11.9833 17.4307 11.9833 17.3043V16.5148C12.9311 17.1454 14.3852 17.5413 16.0001 17.5413C17.6145 17.5413 19.0687 17.1453 20.0167 16.5148V17.3043C20.0167 17.4307 19.942 17.6004 19.7591 17.7931C19.5791 17.9826 19.3086 18.1787 18.9554 18.3561C18.2497 18.7104 17.2315 18.9809 16.0001 18.9809ZM16.0001 16.3722C14.8452 16.3722 13.8247 16.1419 13.0978 15.8172C12.734 15.6547 12.4496 15.4712 12.2587 15.2863C12.0657 15.0994 11.9833 14.9266 11.9833 14.783V14.0271C12.9907 14.6268 14.5303 14.933 16.0001 14.933C17.4696 14.933 19.0092 14.6268 20.0167 14.0271V14.783C20.0167 14.9265 19.9343 15.0993 19.7412 15.2863C19.5503 15.4712 19.2659 15.6547 18.902 15.8172C18.1752 16.1419 17.1547 16.3722 16.0001 16.3722Z" fill="white" stroke="white" stroke-width="0.3"></path>
     </g>
     <defs>
      <linearGradient id="paint0_linear_1699_122456" x1="6.18176" y1="4" x2="6.18176" y2="27" gradientUnits="userSpaceOnUse">
       <stop stop-color="currentColor"></stop>
       <stop offset="1" stop-color="currentColor"></stop>
      </linearGradient>
     </defs>
    </svg>
    <span>ကတ်စီမံခန့်ခွဲမှု</span>
   </a> --}}
  </div>
  {{-- payment --}}
  <div class="container-fluid" style="padding-bottom: 100px;">
    @foreach ($payments as $payment)
    <div class="card bg-transparent p-3 border border-1 border-success text-white">
        <p>နည်းလမ်း - {{ $payment->payment_method }}</p>
        <p>ဖုန်းနံပါတ် - {{ $payment->phone }}</p>
        <p>လက်ခံသူအမည် - {{ $payment->receiver_name }}</p>
    </div>
    @endforeach
  </div>
  {{-- payment --}}
 </div>
</div>
{{-- @include('user.layouts.sub-footer') --}}
@endsection