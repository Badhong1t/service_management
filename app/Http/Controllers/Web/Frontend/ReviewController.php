<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function store(Request $request, $user_id)
    {

        
        $request->validate([
            
            'reviewer-name' => 'required',
            'reviewer-email' => 'required|email',
            'rating' => 'required|integer|between:1,5',
            'reviewer-message' => 'required',
            
        ]);

        // dd('validation passed', $request->all());
        
        try {

            // Store review in database
            $review = new Comment();

            $review->user_id = $user_id;  // Assuming user_id is stored in database for the given user.
            $review->commentator_id = Auth::id(); // Assuming user_id is stored in database for the logged in user.
            $review->name = $request->input('reviewer-name');
            $review->email = $request->input('reviewer-email');
            $review->rating = $request->input('rating');
            $review->comment = $request->input('reviewer-message');
            $review->save();

            return redirect()->back()->with('t-success', 'Review submitted successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', $e->getMessage());
        }
    }
}
