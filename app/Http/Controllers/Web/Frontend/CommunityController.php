<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Models\Community;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Throwable;

class CommunityController extends Controller
{
    
    public function store(Request $request)
    {

        $request->validate([
            'fileUploadInbox' => 'nullable',
            'messageInput' => 'string|max:10000',
        ]);

        try {

            $community = new Community();
            $community->user_id = Auth::user()->id;
            $community->message = $request->messageInput;
            $community->save();

            return redirect()->route('communityInbox')->with('t-success', 'Message sent successfully!');

        } catch (Throwable $th) {
            return redirect()->back()->with('t-error', $th->getMessage());
        }

    }

}
