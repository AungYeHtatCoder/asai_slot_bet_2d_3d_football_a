<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Admin\Promotion;
use App\Traits\HttpResponses;

class PromotionController extends Controller
{
    use HttpResponses;
   public function index()
   {
        $data = Promotion::all();
        return $this->success($data);
        
   }

   public function show($id)
   {
     $promotion = Promotion::find($id);
     return $this->success($promotion);
   }
}
