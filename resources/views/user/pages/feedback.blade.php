@extends('user.layouts.app')

@section('content')
<div class="feedback" style="margin-top: 60px; padding: 10px">
 <h6 class="text-center mb-4 text-white">အကြံပြုရန်</h6>
 <form action="" method="post">
  <div class="mb-3">
   <input type="text" placeholder="အကြောင်းအရာ" class="form-control" />
  </div>
  <div class="mb-3">
   <textarea name="" placeholder="အသေးစိတ်" id="" cols="30" rows="10" class="form-control"></textarea>
  </div>
  <div class="">
   <!-- <div>
              <a href="#" class="btn btn-secondary px-5 py-2">ဖျက်ရန်</a>
            </div> -->
   <div>
    <button type="submit" class="btn-submit">ပို့ရန်</button>
   </div>
  </div>
 </form>
</div>
@include('user.layouts.sub-footer')
@endsection