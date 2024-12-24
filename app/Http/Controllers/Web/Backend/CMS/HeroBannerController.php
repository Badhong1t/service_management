<?php

namespace App\Http\Controllers\Web\Backend\CMS;

use Exception;
use App\Models\CMS;
use App\Enums\Page;
use App\Enums\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HeroBannerController extends Controller
{
    
    public function index()
    {

        $data = CMS::where('section', Section::HERO_BANNER_CONTENT)->where('page', Page::WELCOME_PAGE)->first();

        return view('web.backend.layout.cms.welcome_page.heroBannerContent', compact('data'));

    }

    public function update(Request $request)
    {

        $request->validate([
            'title' => 'string|max:255|nullable',
            'sub_title' => 'string|max:255|nullable',
        ]);

        try {

            $data = CMS::where('section', Section::HERO_BANNER_CONTENT)->where('page', Page::WELCOME_PAGE)->first();
            if (!$data) {
                $data = new CMS();
                $data->section = Section::HERO_BANNER_CONTENT;
                $data->page = Page::WELCOME_PAGE;
            }

            $data->title = $request->title;
            $data->sub_title = $request->sub_title;
            $data->save();
    
            return redirect()->route('admin.hero_banner_content.index')->with('t-success', 'Hero Banner Content updated successfully.');

        }
        catch (Exception $e) {
            return redirect()->route('admin.hero_banner_content.index')->with('t-error', 'Something went wrong! Please try again.');
        }

    }

}
