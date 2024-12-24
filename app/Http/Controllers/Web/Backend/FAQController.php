<?php

namespace App\Http\Controllers\Web\Backend;

use App\Models\FAQ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;
use Yajra\DataTables\Facades\DataTables;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        try {
            if ($request->ajax()) {
                $data = FAQ::orderBy('created_at', 'DESC')->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('short_description', function ($data) {

                        // Strip HTML tags and truncate the content
                        $shortDescription = strip_tags($data->short_description);
                        return $shortDescription;
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
                        $editUrl = route('admin.faq.edit', $data->id);
                        return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="' . $editUrl . '" class="btn btn-primary text-white" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a href="#" onclick="deleteAlert(' . $data->id . ')" class="btn btn-danger text-white" title="Delete">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>';
                    })

                    ->rawColumns(['short_description', 'status', 'action'])
                    ->make(true);
            }
            return view('web.backend.layout.faq.index');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', 'Something went wrong! Please try again.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('web.backend.layout.faq.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
        ]);

        try {

            $data = new FAQ();
            $data->title = $request->title;
            $data->short_description = $request->short_description;
            $data->status = 'active';
            $data->save();

            return redirect()->route('admin.faq.index')->with('t-success', 'FAQ created successfully.');

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
        
        $data = FAQ::find($id);
        return view('web.backend.layout.faq.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'title' => 'string|max:255',
            'short_description' => 'string',
        ]);

        try {

            $data = FAQ::findOrFail($id);
            $data->title = $request->title;
            $data->short_description = $request->short_description;
            $data->status = 'active';
            $data->save();

            return redirect()->route('admin.faq.index')->with('t-success', 'FAQ updated successfully.');

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

            $data = FAQ::find($id);
            $data->delete();

            return response()->json(['success' => true, 'message' => 'Deleted successfully.']);

        }
        catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'Something went wrong! Please try again.']);
        }

    }

    public function changeStatus($id)
    {
        
        $data = FAQ::find($id);
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
