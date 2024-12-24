<?php

namespace App\Http\Controllers\Web\Backend\CMS;

use App\Models\CMS;
use App\Enums\Page;
use App\Enums\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class FeaturedController extends Controller
{
    
    public function index(Request $request)
    {
        // Fetch data from the database

        $data = CMS::where('section', Section::FEATURED)->where('page', Page::USER_HOMEPAGE)->first();

        return view('web.backend.layout.cms.user_homepage.featured', compact('data'));
        
    }

    public function update(Request $request)
    {
        // Update the data in the database

        $request->validate([
            'title' => 'string|max:255|nullable',
        ]);


        try {

            $data = CMS::where('section', Section::FEATURED)->where('page', Page::USER_HOMEPAGE)->first();
            if(!$data){
                $data = new CMS();
            }
            $data->section = Section::FEATURED;
            $data->page = Page::USER_HOMEPAGE;
            $data->title = $request->title;
            $data->save();

            return redirect()->route('admin.featured.index')->with('t-success', 'Featured updated successfully.');
        }
        catch (Exception $e) {

            return redirect()->route('admin.featured.index')->with('t-error', 'Something went wrong! Please try again.');
        }

        
    }

}
