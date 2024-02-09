@extends('user.layouts.app')

@section('content')
<div>
{{-- to do new feature --}}
 <div class="user-information" style="margin-top: 60px; padding: 5px">
  <div class="card">
   <div class="card-header">အကောင့်အချက်အလက်</div>
   <div class="card-body">
    <div class="py-3" style="font-size:14px">
     <a href="#userInformationModal" role="button" data-bs-toggle="modal" class="text-decoration-none text-white">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
       <g id="icon/ä¸ªäººä¸&shy;å¿ƒ/ä¸ªäººä¿¡æ¯">
        <circle id="æ¤&shy;åœ†å½¢" cx="12" cy="12" r="8.40946" stroke="currentColor" stroke-width="1.18108"></circle>
        <circle id="æ¤&shy;åœ†å½¢_2" cx="12" cy="10" r="3.40946" stroke="currentColor" stroke-width="1.18108"></circle>
        <path id="è·¯å¾„" d="M18.0178 18.4218C16.7968 16.3727 14.5588 15 12.0002 15C9.56042 15 7.41217 16.2482 6.15918 18.1408" stroke="currentColor" stroke-width="1.18108"></path>
       </g>
      </svg>
      <span > သတင်းအချက်အလက် ပြန်လည်ပြင်ဆင်ပါ။ </span>
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
       <g id="icon/äºŒçº§é¡µé¢/è¿”å›ž">
        <rect id="çŸ©å½¢" opacity="0.01" width="24" height="24" fill="currentColor"></rect>
        <g id="ç¼–ç»„">
         <path id="è·¯å¾„" d="M11.0004 17.6569L15.243 13.4142C16.0241 12.6332 16.0241 11.3668 15.243 10.5858L11.0004 6.34315" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </g>
       </g>
      </svg>
     </a>
    </div>
    <div class="py-3" style="font-size:14px">
     <a href="#changePasswordModal" role="button" data-bs-toggle="modal" class="text-decoration-none text-white">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
       <g id="icon/ä¸ªäººä¸&shy;å¿ƒ/ç™»å½•å¯†ç&nbsp;">
        <g id="ç¼–ç»„">
         <rect id="çŸ©å½¢" x="4.31808" y="8.59054" width="15.3644" height="11.8189" rx="2.40946" stroke="currentColor" stroke-width="1.18108"></rect>
         <rect id="çŸ©å½¢_2" x="11" y="12" width="2" height="4" rx="1" fill="currentColor"></rect>
         <path id="è·¯å¾„" d="M9 9V9V7.3497C9 5.49971 10.3431 4 12 4C13.6569 4 15 5.49971 15 7.3497V8.91775V8.91775" stroke="currentColor" stroke-width="1.18108"></path>
        </g>
       </g>
      </svg>
      <span> ဝင်ရောက်ရန်စကားဝှက် ပြန်လည်ပြင်ဆင်ပါ။ </span>
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
       <g id="icon/äºŒçº§é¡µé¢/è¿”å›ž">
        <rect id="çŸ©å½¢" opacity="0.01" width="24" height="24" fill="currentColor"></rect>
        <g id="ç¼–ç»„">
         <path id="è·¯å¾„" d="M11.0004 17.6569L15.243 13.4142C16.0241 12.6332 16.0241 11.3668 15.243 10.5858L11.0004 6.34315" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
        </g>
       </g>
      </svg>
     </a>
    </div>
    <!-- <div class="py-3">
              <a href="#" class="text-decoration-none text-white">
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g id="icon/ä¸ªäººä¸&shy;å¿ƒ/ç™»å½•å¯†ç&nbsp;å¤‡ä»½">
                    <g id="ç¼–ç»„ 2">
                      <g id="ç¼–ç»„">
                        <rect
                          id="çŸ©å½¢"
                          x="3.55117"
                          y="5.55117"
                          width="17.8977"
                          height="12.8977"
                          rx="2.24883"
                          stroke="currentColor"
                          stroke-width="1.10235"
                        ></rect>
                        <path
                          id="çŸ©å½¢_2"
                          fill-rule="evenodd"
                          clip-rule="evenodd"
                          d="M19.1632 7.79993C19.4209 7.79993 19.6299 8.00887 19.6299 8.2666V8.2666C19.6299 8.52433 19.4209 8.73327 19.1632 8.73327L6.31633 8.73327C6.0586 8.73327 5.84966 8.52433 5.84966 8.2666V8.2666C5.84966 8.00887 6.0586 7.79993 6.31633 7.79993L19.1632 7.79993Z"
                          fill="currentColor"
                        ></path>
                        <g id="Â¥">
                          <path
                            id="è·¯å¾„"
                            d="M10.0293 10.2024L11.6965 13.1508H10.5679V13.6716H11.9958L12.0043 13.68V14.4024H10.5679V14.9232H12.0043V16.2H12.9961V14.9232H14.4411V14.4024H12.9961V13.68L13.0047 13.6716H14.4411V13.1508H13.3039L14.9712 10.2024H13.8426L12.5002 12.7812L11.1579 10.2024H10.0293Z"
                            fill="currentColor"
                          ></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
                <span> ငွေထုတ်ရန်စကားဝှက် ပြန်လည်ပြင်ဆင်ပါ။ </span>
              </a>
            </div> -->
   </div>
  </div>
 </div>
 @include('user.layouts.sub-footer')
</div>

<!-- USER INFORMAITON MODAL -->

<div class="modal fade" id="userInformationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header text-white">
    <h1 class="modal-title fs-5" id="exampleModalLabel">
     သတင်းအချက်အလက်
    </h1>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
    <div class="py-3 d-flex justify-content-between align-items-center text-white" style="border-bottom: 1px solid #fff">
     <span>ဓာတ်ပုံ</span>
     <img src="{{ asset('slot_app/images/user_avatar.png') }}" alt="" style="width: 50px; height: 50px; border-radius: 50%" />
    </div>

    <div class="py-3 d-flex justify-content-between align-items-center text-white" style="border-bottom: 1px solid #fff">
     <span>ကျား၊မ</span>
     <span>မသတ်မှတ်ထားပါဘူး။</span>
    </div>

    <div class="py-3 d-flex justify-content-between align-items-center text-white" style="border-bottom: 1px solid #fff">
     <span>နာမည်</span>
     <span>TheinTheinSoe</span>
    </div>

    <div class="py-3 d-flex justify-content-between align-items-center text-white" style="border-bottom: 1px solid #fff">
     <span>အမည်ပြောင်</span>
     <span>Blah Blah</span>
    </div>

    <div class="py-3 d-flex justify-content-between align-items-center text-white" style="border-bottom: 1px solid #fff">
     <span>မွေးနေ့</span>
     <span>မသတ်မှတ်ထားပါဘူး။</span>
    </div>
   </div>
  </div>
 </div>
</div>

<!-- CHANGE PASSWORD MODAL -->

<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header text-white">
    <!-- <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1> -->
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
    <form action="">
     <div class="py-3 text-white">
      <label for="oldpassword" class="mb-2">စကားဝှက်ဟောင်းကို ထည့်ပါ။</label>
      <input type="password" id="oldpassword" style="background: transparent" class="form-control text-white" />
     </div>

     <div class="py-3 text-white">
      <label for="confirmpassword" class="mb-2">စကားဝှက်အသစ်ကို အတည်ပြုပါ။</label>
      <input type="password" id="confirmpassword" style="background: transparent" class="form-control text-white" />
     </div>
     <div class="py-3 text-white">
      <label for="newpassword" class="mb-2">စကားဝှက်အသစ်ကို ထည့်ပါ။</label>
      <input type="password" id="newpassword" style="background: transparent" class="form-control text-white" />
     </div>
     <button class="btn-submit my-2">တင်ပြချက်ကို အတည်ပြုပါ။</button>
    </form>
   </div>
  </div>
 </div>
</div>
@endsection