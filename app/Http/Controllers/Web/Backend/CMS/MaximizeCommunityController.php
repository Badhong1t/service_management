<?php

namespace App\Http\Controllers\Web\Backend\CMS;

use App\Models\CMS;
use App\Enums\Page;
use App\Enums\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class MaximizeCommunityController extends Controller
{
    
    public function index(Request $request)
    {
        // Fetch data from the database
        $data = CMS::where('section', Section::MAXIMIZE_COMMUNITY)->where('page', Page::WELCOME_PAGE)->first();

        return view('web.backend.layout.cms.welcome_page.maximizeCommunity', compact('data'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'title' => 'string|max:255|nullable',
            'sub_title' => 'string|max:255|nullable',
            'content' => 'string|nullable',
        ]);
        
        try {

            $data = CMS::where('section', Section::MAXIMIZE_COMMUNITY)->where('page', Page::WELCOME_PAGE)->first();
        if (!$data) {
            $data = new CMS();
            $data->section = Section::MAXIMIZE_COMMUNITY;
            $data->page = Page::WELCOME_PAGE;
        }
        $data->title = $request->title;
        $data->sub_title = $request->sub_title;
        $data->content = $request->content;
        $data->save();

        return redirect()->route('admin.maximize_community.index')->with('t-success', 'Maximize Community updated successfully.');
        } catch (Exception $e) {

            return redirect()->route('admin.maximize_community.index')->with('t-error', 'Something went wrong! Please try again.');

        }

    }

}
