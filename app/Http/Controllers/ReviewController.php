<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    public function show(): View
    {
        $reviews = Review::all();

        return view('reviews', compact('reviews'));
    }

    public function store(ReviewRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $review = new Review($data);
        $review->save();

        return redirect()->back();
    }
}
