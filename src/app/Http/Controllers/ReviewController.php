<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
     public function store(Request $request)
   {
      $review = $request->only(['reservation_id','rate','comment']);
      Review::create($review);
      
      return back();
   }
}
