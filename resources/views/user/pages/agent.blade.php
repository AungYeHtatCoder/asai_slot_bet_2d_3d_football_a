@extends('user.layouts.app')

@section('content')
<div style="margin-top: 50px; padding: 10px 10px 100px 10px">
 <h5>အကြံပြုထားသော အစီအစဉ်</h5>
 <ul class="nav nav-tabs" id="myTabs">
  <li class="nav-item">
   <a class="nav-link active bg-transparent " id="tab1-tab" data-bs-toggle="tab" href="#tab1">
    <div class="text-center mb-2">
     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g id="Component 664">
       <path id="Vector" d="M19.0391 4.1195L22.3189 7.09642C22.7589 7.49545 23.0105 8.06245 23.0105 8.65626L23.0223 20.0522C23.0231 20.8289 22.3938 21.4598 21.617 21.4606H14.597C13.821 21.4606 13.191 20.8321 13.1902 20.0553L13.1783 8.65941C13.1776 8.06402 13.4291 7.49545 13.8699 7.09485L17.1481 4.1195C17.6843 3.63294 18.5029 3.63294 19.0391 4.1195ZM18.1165 7.05147C17.4367 7.05147 16.8855 7.64528 16.8855 8.37867C16.8855 9.11206 17.4367 9.70587 18.1165 9.70587C18.7963 9.70587 19.3475 9.11206 19.3475 8.37867C19.3475 7.64528 18.7963 7.05147 18.1165 7.05147Z" fill="white"></path>
       <path id="Vector_2" d="M14.5135 5.02399L13.2501 6.1706C12.5349 6.81961 12.1225 7.77695 12.1233 8.78477L12.1351 19.9465C12.1351 20.0742 12.1319 20.1531 12.1603 20.3226C12.1887 20.4922 12.124 20.5087 12.001 20.4733C11.4545 20.3171 10.6344 20.0797 9.54062 19.7619C8.79067 19.5451 8.34591 18.7147 8.54542 17.9064L11.214 7.12164C11.3749 6.47263 11.7936 5.93244 12.3575 5.64776L14.2769 4.67858C14.381 4.62575 14.508 4.66754 14.56 4.77164C14.6026 4.85602 14.5837 4.96011 14.5135 5.02399Z" fill="white"></path>
       <path id="Vector_3" d="M13.3953 4.03191L11.8789 4.81261C11.0201 5.25422 10.3743 6.07199 10.114 7.0459L7.23646 17.8307C7.21437 17.9142 7.19151 18.0538 7.18914 18.1697C7.18677 18.2857 7.17495 18.4308 6.85241 18.2336C6.39188 17.9529 5.70107 17.5349 4.77763 16.9813C4.1097 16.5784 3.89441 15.6605 4.29659 14.931L9.66531 5.20454C9.98863 4.61862 10.5328 4.20619 11.1518 4.07686L13.2566 3.63762C13.3709 3.61396 13.4821 3.6873 13.5065 3.80085C13.5262 3.89391 13.4813 3.98775 13.3969 4.03191H13.3953Z" fill="white"></path>
       <path id="Vector_4" d="M12.6091 2.72209L10.942 3.08326C9.99806 3.28751 9.16215 3.91049 8.65903 4.78425L3.08843 14.4563C3.0356 14.5478 2.98828 14.6416 2.94649 14.7363C2.90942 14.8206 2.90311 15.0162 2.68231 14.8191C2.26988 14.4508 1.68711 13.8444 0.932428 12.9998C0.391456 12.4375 0.421422 11.4952 0.99867 10.895L8.70162 2.88927C9.16531 2.40744 9.79776 2.14957 10.4294 2.18506L12.576 2.30571C12.6927 2.31202 12.781 2.41217 12.7747 2.5281C12.7692 2.62273 12.7013 2.70237 12.6091 2.72209Z" fill="white"></path>
      </g>
     </svg>
    </div>
    <p class="text-white mb-0" style="font-size: 10px;">မိတ်ဆက်ခံရသူ</p>
   </a>
  </li>
  <li class="nav-item">
   <a class="nav-link bg-transparent" id="tab2-tab" data-bs-toggle="tab" href="#tab2">
    <div class="text-center mb-2">
     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g id="Component 664">
       <path id="Vector" d="M12.2843 1.58386C13.3827 1.58386 14.2732 2.54386 14.2732 3.72818C14.2732 3.74454 14.2732 3.76091 14.2725 3.77727C14.9932 4.00773 15.6723 4.34727 16.2927 4.77614C16.6452 4.4325 17.1129 4.2225 17.6257 4.2225C18.7241 4.2225 19.6145 5.1825 19.6145 6.36682C19.6145 6.97636 19.3786 7.52659 18.9995 7.91727C19.3493 8.61341 19.6125 9.36886 19.7734 10.1652C20.8248 10.2211 21.6607 11.158 21.6607 12.3055C21.6607 13.4898 20.7702 14.4498 19.6718 14.4498C19.6561 14.4498 19.6411 14.4498 19.6261 14.4491C19.4413 15.1234 19.1795 15.7643 18.8536 16.3589C19.185 16.74 19.3882 17.2548 19.3882 17.82C19.3882 19.0043 18.4977 19.9643 17.3993 19.9643C16.875 19.9643 16.3984 19.7461 16.0432 19.3889C15.4929 19.74 14.8984 20.0216 14.2718 20.2227L14.2732 20.2711C14.2732 21.4555 13.3827 22.4155 12.2843 22.4155C11.1859 22.4155 10.2954 21.4555 10.2954 20.2711L10.2988 20.3809C9.56044 20.2077 8.86021 19.9234 8.21453 19.5457C7.85317 19.9548 7.34249 20.2098 6.77726 20.2098C5.67885 20.2098 4.78839 19.2498 4.78839 18.0655C4.78839 17.5125 4.98271 17.008 5.3018 16.6275C4.90362 15.9593 4.5893 15.227 4.37453 14.4484L4.32953 14.4505C3.23112 14.4505 2.34067 13.4905 2.34067 12.3061C2.34067 11.1218 3.23112 10.1618 4.32953 10.1618L4.22794 10.1659C4.41067 9.2625 4.72499 8.41227 5.1484 7.63977C4.81635 7.25795 4.61385 6.74386 4.61385 6.17863C4.61385 4.99432 5.5043 4.03432 6.60271 4.03432C7.12703 4.03432 7.60362 4.25318 7.95953 4.61045C8.67408 4.15432 9.46226 3.81477 10.3002 3.61841C10.3527 2.48454 11.222 1.58386 12.2857 1.58386H12.2843ZM10.4168 4.46864L10.3759 4.4775C9.68112 4.65477 9.02521 4.9425 8.42453 5.32364C8.53158 5.58545 8.59021 5.87454 8.59021 6.17863C8.59021 7.36295 7.69976 8.32295 6.60135 8.32295C6.32999 8.32295 6.0709 8.26432 5.83499 8.15795C5.4859 8.82 5.22271 9.54545 5.0659 10.3145C5.79953 10.6295 6.31771 11.402 6.31771 12.3055C6.31771 13.1536 5.86158 13.8866 5.19885 14.2343C5.38294 14.8977 5.6468 15.5243 5.97953 16.0998C6.2243 15.9839 6.49362 15.9198 6.77658 15.9198C7.87499 15.9198 8.76544 16.8798 8.76544 18.0641C8.76544 18.3252 8.72249 18.5755 8.64271 18.8066C9.1943 19.1298 9.79021 19.3752 10.4175 19.5314C10.6963 18.7105 11.4266 18.1261 12.2843 18.1261C13.0882 18.1261 13.7809 18.6409 14.0945 19.3807C14.6168 19.2068 15.1125 18.9682 15.5754 18.6743C15.4684 18.4125 15.4098 18.1234 15.4098 17.8193C15.4098 16.635 16.3002 15.675 17.3986 15.675C17.67 15.675 17.9291 15.7336 18.165 15.84C18.4295 15.3389 18.645 14.7995 18.8018 14.233C18.1391 13.8859 17.6823 13.153 17.6823 12.3055C17.6823 11.402 18.1998 10.6295 18.9327 10.3132C18.7943 9.63409 18.5734 8.98841 18.2816 8.38977C18.0763 8.46886 17.8554 8.51114 17.625 8.51114C16.5266 8.51114 15.6361 7.55113 15.6361 6.36682C15.6361 6.05113 15.6995 5.75182 15.8127 5.48182C15.2843 5.11432 14.7068 4.82114 14.0945 4.61523C13.7809 5.35636 13.0882 5.87114 12.2836 5.87114C11.4266 5.87114 10.6963 5.28682 10.4161 4.46727L10.4168 4.46864Z" fill="white"></path>
      </g>
     </svg>
    </div>
    <p class="mb-0 text-white" style="font-size: 10px;">စာရင်းအင်းများ</p>
   </a>
  </li>
  <li class="nav-item">
   <a class="nav-link bg-transparent" id="tab3-tab" data-bs-toggle="tab" href="#tab3">
    <div class="text-center mb-2">
     <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g id="Component 664">
       <g id="Frame" clip-path="url(#clip0_55_2850)">
        <path id="Vector" d="M16.875 9.20178C16.849 9.47477 16.7742 9.69252 16.6507 9.85502C16.5272 10.0175 16.4005 10.1443 16.2705 10.2353C16.1145 10.3393 15.9455 10.4108 15.7635 10.4498C15.6595 10.6708 15.549 10.8788 15.432 11.0738C15.328 11.2428 15.2207 11.4085 15.1102 11.571C14.9997 11.7335 14.8925 11.8603 14.7885 11.9513C14.6715 12.0553 14.561 12.143 14.457 12.2145C14.353 12.286 14.262 12.3608 14.184 12.4388C14.106 12.5168 14.041 12.611 13.989 12.7215C13.937 12.832 13.898 12.9652 13.872 13.1212C13.846 13.3032 13.8167 13.4852 13.7842 13.6672C13.7517 13.8492 13.7452 14.0312 13.7647 14.2132C13.7842 14.3952 13.846 14.574 13.95 14.7495C14.054 14.925 14.236 15.0842 14.496 15.2272V20.9602C14.496 21.0642 14.5155 21.1649 14.5545 21.2624C14.5935 21.3599 14.6455 21.4412 14.7105 21.5062C14.0865 21.5712 13.482 21.6232 12.897 21.6622C12.312 21.7012 11.7985 21.7207 11.3565 21.7207C10.9795 21.7207 10.5408 21.7044 10.0403 21.6719C9.53977 21.6394 9.02302 21.6004 8.49003 21.5549C7.95703 21.5094 7.43054 21.4574 6.91054 21.3989C6.39054 21.3404 5.91605 21.2787 5.48705 21.2137C5.05805 21.1487 4.69405 21.0837 4.39506 21.0187C4.09606 20.9537 3.90756 20.8887 3.82956 20.8237C3.68656 20.7197 3.57931 20.4012 3.50781 19.8682C3.43631 19.3352 3.46556 18.6462 3.59556 17.8012C3.64756 17.4762 3.75481 17.2097 3.91731 17.0017C4.07981 16.7937 4.27806 16.615 4.51206 16.4655C4.74605 16.316 5.00605 16.1957 5.29205 16.1047C5.57805 16.0137 5.87055 15.926 6.16954 15.8415C6.46854 15.757 6.75779 15.666 7.03729 15.5685C7.31679 15.471 7.57353 15.3507 7.80753 15.2077C8.08053 15.0387 8.29178 14.873 8.44128 14.7105C8.59078 14.548 8.69478 14.3887 8.75328 14.2327C8.81178 14.0767 8.84103 13.9142 8.84103 13.7452C8.84103 13.5762 8.83453 13.3942 8.82153 13.1992C8.79553 12.8872 8.69153 12.6468 8.50953 12.4778C8.32753 12.3088 8.13253 12.1333 7.92453 11.9513C7.82053 11.8603 7.71653 11.7335 7.61253 11.571C7.50854 11.4085 7.41754 11.2428 7.33954 11.0738C7.24854 10.8788 7.15754 10.6708 7.06654 10.4498C6.92354 10.4238 6.78704 10.3783 6.65704 10.3133C6.54004 10.2483 6.42304 10.1573 6.30604 10.0403C6.18904 9.92327 6.09804 9.75427 6.03305 9.53327C5.95505 9.31227 5.9388 9.11078 5.9843 8.92878C6.0298 8.74678 6.09804 8.59078 6.18904 8.46078C6.29304 8.31778 6.42304 8.18128 6.57904 8.05128C6.59204 7.55729 6.64404 7.06329 6.73504 6.56929C6.81304 6.1533 6.92679 5.7048 7.07629 5.2238C7.22579 4.74281 7.43704 4.31381 7.71003 3.93681C7.95703 3.57281 8.23328 3.27707 8.53878 3.04957C8.84428 2.82207 9.15627 2.64332 9.47477 2.51332C9.79327 2.38332 10.1118 2.29557 10.4303 2.25007C10.7488 2.20457 11.0575 2.18182 11.3565 2.18182C11.7335 2.18182 12.0975 2.22407 12.4485 2.30857C12.7995 2.39307 13.1245 2.50682 13.4235 2.64982C13.7225 2.79282 13.989 2.95532 14.223 3.13732C14.457 3.31932 14.6455 3.50131 14.7885 3.68331C15.1265 4.09931 15.3897 4.56081 15.5782 5.0678C15.7667 5.5748 15.913 6.0493 16.017 6.49129C16.134 7.01129 16.212 7.53129 16.251 8.05128C16.381 8.11628 16.498 8.20078 16.602 8.30478C16.693 8.39578 16.7677 8.51278 16.8262 8.65578C16.8847 8.79878 16.901 8.98078 16.875 9.20178ZM19.8779 15.6562C20.0859 15.6562 20.2582 15.7277 20.3947 15.8707C20.5312 16.0137 20.5994 16.1827 20.5994 16.3777V19.6927C20.5994 19.7967 20.5312 19.9625 20.3947 20.1899C20.2582 20.4174 20.0989 20.6514 19.9169 20.8919C19.7349 21.1324 19.553 21.3437 19.371 21.5257C19.189 21.7077 19.046 21.7987 18.942 21.7987H16.4265C16.2185 21.7987 16.0462 21.7304 15.9097 21.5939C15.7732 21.4574 15.705 21.2852 15.705 21.0772V16.3777C15.705 16.1827 15.7732 16.0137 15.9097 15.8707C16.0462 15.7277 16.2185 15.6562 16.4265 15.6562H19.8779ZM17.2065 16.8652C17.1025 16.8652 17.018 16.9075 16.953 16.992C16.888 17.0765 16.8555 17.2292 16.8555 17.4502C16.8555 17.6062 16.888 17.746 16.953 17.8695C17.018 17.993 17.1025 18.0547 17.2065 18.0547H19.1565C19.2605 18.0547 19.319 17.98 19.332 17.8305C19.345 17.681 19.3515 17.5542 19.3515 17.4502C19.3515 17.3462 19.345 17.2227 19.332 17.0797C19.319 16.9367 19.2605 16.8652 19.1565 16.8652H17.2065ZM19.0395 20.3752C19.1435 20.3752 19.2247 20.2972 19.2832 20.1412C19.3417 19.9852 19.371 19.8552 19.371 19.7512C19.371 19.6472 19.3417 19.5367 19.2832 19.4197C19.2247 19.3027 19.1435 19.2442 19.0395 19.2442H17.1675C17.0635 19.2442 16.9822 19.3092 16.9237 19.4392C16.8652 19.5692 16.836 19.6862 16.836 19.7902C16.836 19.8942 16.8652 20.0177 16.9237 20.1607C16.9822 20.3037 17.0635 20.3752 17.1675 20.3752H19.0395Z" fill="white"></path>
       </g>
      </g>
      <defs>
       <clipPath id="clip0_55_2850">
        <rect width="19.6364" height="19.6364" fill="white" transform="translate(2.18182 2.18182)"></rect>
       </clipPath>
      </defs>
     </svg>
    </div>

    <p class="text-white mb-0" style="font-size: 10px;">ပရောက်စီအစီရင်ခံစာ</p>
   </a>
  </li>
 </ul>


 <div class="tab-content mt-2">
  <div class="tab-pane fade show active" id="tab1">
   <div>

    <div class="p-3 rounded" style="background-color:#002635;position: relative;">
     <p>မိတ်ဖက်များကို ဖိတ်ခေါ်ပါ။</p>
     <label for="url" style="font-size: 12px;">ဖိတ်ကြားရန် url</label>
     <input type="text" class="w-100 h-25 rounded p-2 mt-2">
     <i class="fa-solid fa-copy fa-xl text-dark" style="position: absolute;bottom: 50%;right: 5%;"></i>
     <p class="mt-2" style="font-size: 12px;">နည်းလမ်းမျှဝေခြင်း။</p>
     <div class="d-flex">
      <img src="https://front-o2.jingadd.xyz/bucketimg/3fc3a900-77b6-4add-a07d-a0b8e0ba1ed0.png" alt="" width="25px" height="auto">
      <img src="https://front-o2.jingadd.xyz/bucketimg/fc1634f4-23ae-40c5-b8ff-23f5fd14b5b3.png" alt="" width="25px" height="auto">
      <img src="https://front-o2.jingadd.xyz/bucketimg/55ce7319-b05d-479a-9cc2-6811f6170a42.png" alt="" width="25px" height="auto">
      <img src="https://front-o2.jingadd.xyz/bucketimg/bfc75684-3579-4552-a01e-2923af43a942.png" alt="" width="25px" height="auto">
      <img src="https://front-o2.jingadd.xyz/bucketimg/abae1e39-ac89-4732-98bb-8b5ad3284ff9.png" alt="" width="25px" height="auto">
     </div>
    </div>

    <div class="p-3 rounded mt-3" style="background-color:#002635">

     <p class="text-center">လစဉ်ဝင်ငွေပန်းတိုင်</p>
     <p style="color: gold;">Ks 0.00</p>
     <p style="font-size: 14px;">100 ပန်းတိုင်မရောက်မီ လူများကို ဖိတ်ကြားရန် လိုအပ်သေးသည်။</p>
    </div>

    <p class="my-2" style="font-size: 20px;">proxy money ဘယ်လိုအလုပ်လုပ်သလဲ။</p>

    <div class="p-3 rounded mt-3" style="background-color:#002635">

     <p>ဖိတ်စာဆုကြေး</p>
     <p style="color: #ddd;font-size: 14px;">အားပြန်သွင်းအသုံးပြုသူတိုင်း အနည်းဆုံး ရနိုင်သည်။ပြန်လည်ဖြည့်သွင်းသည့် ပမာဏ ပိုများလေ၊ သက်ဆိုင်ရာ အဆင့်၏ ဖိတ်ကြားချက် ဘောနပ်စ် ပိုများလေ ဖြစ်သည်။</p>

     <div class="d-flex my-1">
      <div class="rounded p-2 border border-1 bg-transparent mx-2" style="height: auto;">
       <span>ဖိတ်ကြားထားသောအသုံးပြုသူ</span>
      </div>
      <div class="rounded p-2 border border-1 bg-transparent mx-2" style="height: auto;">
       <span>LV 1 အေးဂျင့်ဆုကြေး</span>
      </div>
      <div class="rounded p-2 border border-1 bg-transparent mx-2" style="height: auto;">
       <span>LV 2 အေးဂျင့်ဆုကြေး</span>
      </div>
      <div class="rounded p-2 border border-1 bg-transparent mx-2" style="height: auto;">
       <span>LV 3 အေးဂျင့်ဆုကြေး</span>
      </div>
     </div>

     <div class="d-flex my-1">
      <div class="rounded p-2 border border-1 bg-transparent mx-2" style="width:40%;height: auto;">
       <span>20</span>
      </div>
      <div class="rounded p-2 border border-1 bg-transparent mx-2" style="width:40%;height: auto;">
       <span>Ks 0.00</span>
      </div>
      <div class="rounded p-2 border border-1 bg-transparent mx-2" style="width:40%;height: auto;">
       <span>Ks 0.00</span>
      </div>
      <div class="rounded p-2 border border-1 bg-transparent mx-2" style="width:40%;height: auto;">
       <span>Ks 0.00</span>
      </div>
     </div>


    </div>


    <p class="my-4" style="font-size: 20px;">လောင်းကြေးကော်မရှင်ကို ဘယ်လိုရယူမလဲ။</p>

    <div class="p-3 rounded mt-3" style="background-color:#002635;color: #ddd;font-size: 14px;">
     <p>၎င်းသည် သင်၏ရေရှည်၀င်ငွေဖြစ်သည်။ သင်၏ရည်ညွှန်းလင့်ခ်မှတစ်ဆင့် ပလပ်ဖောင်းတွင်ပါဝင်သူတစ်ဦးသည် သင့်ရည်ညွှန်းသူဖြစ်လာသည့်အခါတိုင်း၊ သင်သည် မတူညီသောကော်မရှင်ရာခိုင်နှုန်းကို ရရှိမည်ဖြစ်ပြီး စေတနာအပြည့်ဖြင့် ဘောနပ်စ်များကို ရရှိမည်ဖြစ်သည်။</p>

     <p class="my-1">3 အဆင့်၏ စကေးမှာ အောက်ပါအတိုင်းဖြစ်သည်။</p>

     <ul style="list-style-type: none;">
      <li>
       <p>အဆင့် 1- <span style="color: gold;">30.00%</span> ၏ platform အားသာချက်ကို ရယူပါ။</p>
      </li>
      <li>
       <p>အဆင့် 2- <span style="color: gold;">20.00%</span> ၏ platform အားသာချက်ကို ရယူပါ။</p>
      </li>
      <li>
       <p>အဆင့် 3- <span style="color: gold;">10.00%</span> ၏ platform အားသာချက်ကို ရယူပါ။</p>
      </li>
     </ul>

     <div class="rounded bg-transparent border border-1 p-2 my-2">
      <img src="https://www.iw021.com/img/level1.ebf37c36.png" class="w-100" alt="">
     </div>

     <img src="https://www.iw021.com/img/level2.a9bd26f9.png" class="w-100 my-3" alt="">

    </div>

    <div class="rounded p-3 mt-3" style="background-color:#002635;">
     <p class="text-center" style="font-size: 14px;">ဦးဆောင်သူ</p>
     <div class="d-flex justify-content-center align-items-center">
      <div class="text-center">
       <p>TOP 1</p>
       <img src="https://www.iw021.com/img/2.cf94ec98.jpg" class="w-50 rounded-circle" alt="">
       <p>ekmu*****45</p>
       <p style="font-size: 14px;color: gold;">Ks 1123456.98</p>
      </div>
      <div class="text-center">
       <p>TOP 2</p>
       <img src="https://www.iw021.com/img/2.cf94ec98.jpg" class="w-50  rounded-circle" alt="">
       <p>ekmu*****45</p>
       <p style="font-size: 14px;color: gold;">Ks 1123456.98</p>
      </div>
      <div class="text-center">
       <p>TOP 3</p>
       <img src="https://www.iw021.com/img/2.cf94ec98.jpg" class="w-50  rounded-circle" alt="">
       <p>ekmu*****45</p>
       <p style="font-size: 14px;color: gold;">Ks 1123456.98</p>
      </div>
     </div>
    </div>
   </div>
  </div>
  <div class="tab-pane fade" id="tab2">
   <div class="rounded p-3 text-center" style="background-color: #ddd;">
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAABSCAMAAACrFizdAAAAsVBMVEUAAAD///////9ERET///////////9AQEBBQUFCQkJCQkJDQ0NAQEBDQ0NCQkJCQkJCQkJAQED///9CQkJCQkJAQEBCQkJERERCQkJDQ0NFRUVCQkJDQ0NDQ0NCQkJDQ0NDQ0NCQkJCQkJCQkJCQkJDQ0NCQkK4uLhAQEBFRUVCQkJDQ0NAQEBQUFBUVFSHh4d9fX2AgIAmJiZDQ0M5OTk8PDwwMDApKSktLS03NzdAQEBYK7FNAAAAMnRSTlMAFBBPDQsHCSDgtfsE99WF4ywF9+ob88vArqWNa0g78tu7fXdcU0MeEdGacxiNezE1NMK0RL0AAAKZSURBVGje7NbNcoIwFIbhb8YF4R+GolIQrVbHqqt8grb3f2G9AWtDTrLoTJ89zAsk5OCvKKM1J1g3JZzap5wo3cOhPmVbY4L6xLiHM6pgjolaFgqOHDeMAkyURNwc4UTwxiywuCzjMoALEUMFC3XIJoFczrmClXLOHGI7VgdYOlTcQWhFCjb0O+MZRA4ptxDYMu0hoF7YQqTli4K1OmSUQCSJGNawFCwc7ORgyUVgeWnE8AKxi/VrPBl8PsOFdLJbwFUPJ/qKW6stvIIjs5jvmGiVsoMz3eSnKVPmcCjnupw4gbzCqVcWSjaByIeKzVEwgcgFGd9Mb9owVHBOhWyMJ5ASAtL5ZMdqBS8OFc/4HX+QdQkMJV0W8zFBABklxqcYKQnQD41fbE0X0deoHxIF6DvjGgYuKe/aR4C+8gwDZ161n4DR7P/ccPQUcOcSBpa8ewq4cQEDH7x5CtCcJwabcO0vYDAZbPYctK+AkYUyOHNGbwF6YLGbPdUVHLS/gNvAXw03ecAT4+f1qc9Ra3mAyH/Ad7vlltowDERR32FGEAz5EIFANhDykaT14NrZ/8Y6hkKpxi1JIyk/Ohs4x9cPuQW0gBbQAlpAC2gBzwaEsgHhbzkTUDYAIIm/2WGUD1hgP4QQUC3AIPmhZwB1Awz+vnqgfsDC1wqEVwWAnN/Y6TQUYtIdXIEgYa/zUIhZ90jgDilnvQ2FuOkZKT7grS91DybVdx/ASDnoOBRh1ANS2D+EOG50/Mivn0fdHIE7XgNct1qE7XXNb4jb4HLqNTP96eKuX9ynuCrsDqOakKwdx9Xg0K0Sa+xAfMdfkaOw3C/BlN8tsXuMYBmUwWzq0D1BsJD/lBCbOHQ5idYiwpazkOgW2Jxi1vjA2J+WviNztlfQPgAAAABJRU5ErkJggg==" alt="" width="50px" height="auto" class="mx-auto" />
    <h3 class="text-center text-dark" style="font-size: 12px;">ဒေတာမရှိပါ။</h3>
   </div>
  </div>
  <div class="tab-pane fade" id="tab3">
   <div class="rounded p-3 text-center" style="background-color: #ddd;">
    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAABSCAMAAACrFizdAAAAsVBMVEUAAAD///////9ERET///////////9AQEBBQUFCQkJCQkJDQ0NAQEBDQ0NCQkJCQkJCQkJAQED///9CQkJCQkJAQEBCQkJERERCQkJDQ0NFRUVCQkJDQ0NDQ0NCQkJDQ0NDQ0NCQkJCQkJCQkJCQkJDQ0NCQkK4uLhAQEBFRUVCQkJDQ0NAQEBQUFBUVFSHh4d9fX2AgIAmJiZDQ0M5OTk8PDwwMDApKSktLS03NzdAQEBYK7FNAAAAMnRSTlMAFBBPDQsHCSDgtfsE99WF4ywF9+ob88vArqWNa0g78tu7fXdcU0MeEdGacxiNezE1NMK0RL0AAAKZSURBVGje7NbNcoIwFIbhb8YF4R+GolIQrVbHqqt8grb3f2G9AWtDTrLoTJ89zAsk5OCvKKM1J1g3JZzap5wo3cOhPmVbY4L6xLiHM6pgjolaFgqOHDeMAkyURNwc4UTwxiywuCzjMoALEUMFC3XIJoFczrmClXLOHGI7VgdYOlTcQWhFCjb0O+MZRA4ptxDYMu0hoF7YQqTli4K1OmSUQCSJGNawFCwc7ORgyUVgeWnE8AKxi/VrPBl8PsOFdLJbwFUPJ/qKW6stvIIjs5jvmGiVsoMz3eSnKVPmcCjnupw4gbzCqVcWSjaByIeKzVEwgcgFGd9Mb9owVHBOhWyMJ5ASAtL5ZMdqBS8OFc/4HX+QdQkMJV0W8zFBABklxqcYKQnQD41fbE0X0deoHxIF6DvjGgYuKe/aR4C+8gwDZ161n4DR7P/ccPQUcOcSBpa8ewq4cQEDH7x5CtCcJwabcO0vYDAZbPYctK+AkYUyOHNGbwF6YLGbPdUVHLS/gNvAXw03ecAT4+f1qc9Ra3mAyH/Ad7vlltowDERR32FGEAz5EIFANhDykaT14NrZ/8Y6hkKpxi1JIyk/Ohs4x9cPuQW0gBbQAlpAC2gBzwaEsgHhbzkTUDYAIIm/2WGUD1hgP4QQUC3AIPmhZwB1Awz+vnqgfsDC1wqEVwWAnN/Y6TQUYtIdXIEgYa/zUIhZ90jgDilnvQ2FuOkZKT7grS91DybVdx/ASDnoOBRh1ANS2D+EOG50/Mivn0fdHIE7XgNct1qE7XXNb4jb4HLqNTP96eKuX9ynuCrsDqOakKwdx9Xg0K0Sa+xAfMdfkaOw3C/BlN8tsXuMYBmUwWzq0D1BsJD/lBCbOHQ5idYiwpazkOgW2Jxi1vjA2J+WviNztlfQPgAAAABJRU5ErkJggg==" alt="" width="50px" height="auto" class="mx-auto" />
    <h3 class="text-center text-dark" style="font-size: 12px;">ဒေတာမရှိပါ။</h3>
   </div>
  </div>
 </div>

 @include('user.layouts.sub-footer')
</div>
@endsection