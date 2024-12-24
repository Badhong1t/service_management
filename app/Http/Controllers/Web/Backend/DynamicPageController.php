<?php

namespace App\Http\Controllers\Web\Backend;

use Exception;
use App\Models\DynamicPage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class DynamicPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        try {
            if ($request->ajax()) {
                $data = DynamicPage::all();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('page_content', function ($data) {

                        // Strip HTML tags and truncate the content
                        $content = strip_tags($data->page_content);
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
                        $editUrl = route('admin.dynamic_page.edit', $data->id);
                        return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="' . $editUrl . '" class="btn btn-primary text-white" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a href="#" onclick="deleteAlert(' . $data->id . ')" class="btn btn-danger text-white" title="Delete">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>';
                    })
                    ->rawColumns(['page_content', 'status', 'action'])
                    ->make(true);
            }
            return view('web.backend.layout.dynamic_page.index');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', 'Something went wrong! Please try again.');
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('web.backend.layout.dynamic_page.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'page_title' => 'required|string|max:255',
            'page_content' => 'required|string',
        ]);

        try {
            $dynamicPage = new DynamicPage();
            $dynamicPage->page_title = $request->page_title;
            $dynamicPage->page_content = $request->page_content;
            $dynamicPage->page_slug = Str::slug($request->page_title);
            $dynamicPage->status = 'active';
            $dynamicPage->save();

            return redirect()->route('admin.dynamic_page.index')->with('t-success', 'Page created successfully.');

        } catch (Exception $e) {
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
        
        $data = DynamicPage::findOrFail($id);

        return view('web.backend.layout.dynamic_page.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'page_title' => 'nullable|string|max:255',
            'page_content' => 'nullable|string',
        ]);

        try {
            $dynamicPage = DynamicPage::findOrFail($id);
            $dynamicPage->page_title = $request->page_title;
            $dynamicPage->page_content = $request->page_content;
            $dynamicPage->page_slug = Str::slug($request->page_title);
            $dynamicPage->status = 'active';
            $dynamicPage->save();

            return redirect()->route('admin.dynamic_page.index')->with('t-success', 'Page updated successfully.');

        } catch (Exception $e) {
            return redirect()->back()->with('t-error', 'Something went wrong! Please try again.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        try {
            $dynamicPage = DynamicPage::findOrFail($id);
            $dynamicPage->delete();

            return response()->json(['success' => true,'message' => 'Deleted successfully.']);

        } catch (Exception $e) {
            return response()->json(['success' => false,'message' => 'Something went wrong! Please try again.']);
        }

    }

    public function changeStatus($id)
    {
        
        $data = DynamicPage::findOrFail($id);
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
