<?php

namespace App\Http\Controllers\Web\Backend\CMS;

use Exception;
use App\Models\CMS;
use App\Enums\Page;
use App\Enums\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommunityCloaseController extends Controller
{
    
    public function index()
    {

        $data = CMS::where('section', Section::COMMUNITY_CLOASE)->where('page', Page::WELCOME_PAGE)->first();

        return view('web.backend.layout.cms.welcome_page.communityOnCloase', compact('data'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'title' => 'string|max:255|nullable',            
        ]);
        
        try {

            $data = CMS::where('section', Section::COMMUNITY_CLOASE)->where('page', Page::WELCOME_PAGE)->first();
            if(!$data){
                $data = new CMS();
            }
            $data->section = Section::COMMUNITY_CLOASE;
            $data->page = Page::WELCOME_PAGE;
            $data->title = $request->title;
            $data->save();

            return redirect()->route('admin.community_cloase.index')->with('t-success', 'Community Cloase updated successfully.');
        }
        catch (Exception $e) {

            return redirect()->route('admin.community_cloase.index')->with('t-error', 'Something went wrong! Please try again.');
        }

    }

}
