<?php

namespace App\Http\Controllers\Web\Backend\CMS;

use App\Models\CMS;
use App\Enums\page;
use App\Enums\Section;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Yajra\DataTables\Facades\DataTables;

class ConnectCommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = CMS::where('page', Page::WELCOME_PAGE)->where('section', Section::CONNECT_COMMUNITY)->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function ($data) {
                        $image = $data->image;
                        $url = asset($image);
                        return '<img src="' . $url . '" alt="image" width="100px" height="100px" style="margin-left:20px;">';
                    })
                    ->addColumn('content', function ($data) {

                        // Strip HTML tags and truncate the content
                        $content = strip_tags($data->content);
                        return $content;
                    })
                    ->addColumn('status', function ($data) {
                        $status = ' <div class="form-check form-switch" style="margin-left:40px;">';
                        $status .= ' <input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status"';
                        if ($data->status == 'active') {
                            $status .= "checked";
                        }
                        $status .= '><label for="customSwitch' . $data->id . '" class="form-check-label" for="customSwitch"></label></div>';

                        return $status;
                    })
                    ->addColumn('action', function ($data) {
                        $editUrl = route('admin.connect_community.edit', $data->id);
                        return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="' . $editUrl . '" class="btn btn-primary text-white" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a href="#" onclick="deleteAlert(' . $data->id . ')" class="btn btn-danger text-white" title="Delete">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>';
                    })

                    ->rawColumns(['image', 'content', 'status', 'action'])
                    ->make(true);
            }
            return view('web.backend.layout.cms.welcome_page.connect_community.index');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', 'Something went wrong! Please try again.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('web.backend.layout.cms.welcome_page.connect_community.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {

            $data = new CMS();
            $data->title = $request->title;
            $data->content = $request->content;
            $data->status = 'active';
            $data->section = Section::CONNECT_COMMUNITY;
            $data->page = Page::WELCOME_PAGE;

            if ($request->hasFile('image')) {
                $data->image = Helper::fileUpload($request->file('image'), 'cms', $request->image->getClientOriginalName());
            }

            $data->save();

            return redirect()->route('admin.connect_community.index')->with('t-success', 'Connect Community created successfully.');

        }
        catch (Exception $e) {
            return redirect()->back()->with('t-error', 'Something went wrong! Please try again.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $data = CMS::find($id);
        return view('web.backend.layout.cms.welcome_page.connect_community.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => 'string|max:255|nullable',
            'content' => 'string|nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        ]);

        try {

            $data = CMS::find($id);
            $data->title = $request->title;
            $data->content = $request->content;
            $data->status = 'active';
            $data->section = Section::CONNECT_COMMUNITY;
            $data->page = Page::WELCOME_PAGE;

            if ($request->hasFile('image')) {
                $data->image = Helper::fileUpload($request->file('image'), 'cms', $request->image->getClientOriginalName());
            }

            $data->save();

            return redirect()->route('admin.connect_community.index')->with('t-success', 'Connect Community updated successfully.');

        }
        catch (Exception $e) {
            return redirect()->back()->with('t-error', 'Something went wrong! Please try again.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        try {

            $data = CMS::find($id);
            $data->delete();

            return response()->json(['success' => true, 'message' => 'Deleted successfully.']);

        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong! Please try again.']);
        }

    }

    public function changeStatus($id)
    {
        
        $data = CMS::find($id);
        if ($data->status == 'active') {
            $data->status = 'inactive';
            $data->save();
            return response()->json([
                'success' => false,
                'message' => 'Unpublished Successfully.',
                'data' => $data,
            ]);
        } else {
            $data->status = 'active';
            $data->save();
            return response()->json([
                'success' => true,
                'message' => 'Published Successfully.',
                'data' => $data,
            ]);
        }

    }

}
