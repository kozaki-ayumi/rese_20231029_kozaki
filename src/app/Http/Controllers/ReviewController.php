<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;

class ReviewController extends Controller
{
   public function store(ReviewRequest $request)
   {
      $review = $request->only(['reservation_id','rate','comment']);
      Review::create($review);

      return redirect('/mypage')->with('message','レビューありがとうございました。');
   }
}
