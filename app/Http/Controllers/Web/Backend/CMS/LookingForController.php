<?php

namespace App\Http\Controllers\Web\Backend\CMS;

use App\Models\CMS;
use App\Enums\Page;
use App\Enums\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class LookingForController extends Controller
{
    
    public function index()
    {
        
        $data = CMS::where('section', Section::LOOKING_FOR)->where('page', Page::USER_HOMEPAGE)->first();

        return view('web.backend.layout.cms.user_homepage.lookingFor', compact('data'));

    }

    public function update(Request $request)
    {
        
        $request->validate([
            'title' => 'string|max:255|nullable',
        ]);


        try {

            $data = CMS::where('section', Section::LOOKING_FOR)->where('page', Page::USER_HOMEPAGE)->first();
            if(!$data){
                $data = new CMS();
            }
            $data->section = Section::LOOKING_FOR;
            $data->page = Page::USER_HOMEPAGE;
            $data->title = $request->title;
            $data->save();

            return redirect()->route('admin.looking_for.index')->with('t-success', 'Looking For updated successfully.');
        }
        catch (Exception $e) {

            return redirect()->route('admin.looking_for.index')->with('t-error', 'Something went wrong! Please try again.');
        }

    }

}
