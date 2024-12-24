<?php

namespace App\Http\Controllers\Web\Backend;

// use App\Models\Verification;
use App\Models\Verification;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Exception;

class BusinessVarificationController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = Verification::whereHas('user',function($query){
                    $query->where('user_type','business');
                })
                ->with('user')
                ->orderBy('created_at', 'DESC')
                ->get();
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('image', function ($data) {
                        $url = asset($data->image);
                        return '<img src="' . $url . '" alt="image" width="100px" height="100px" style="margin-left:20px;">';
                    })
                    ->addColumn('status', function ($data) {
                        $status = ' <div class="form-check form-switch" style="margin-left:40px;">';
                        $status .= ' <input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status"';
                        if ($data->status == 1) {
                            $status .= "checked";
                        }
                        $status .= '><label for="customSwitch' . $data->id . '" class="form-check-label" for="customSwitch"></label></div>';
    
                        return $status;
                    })
                    ->addColumn('action', function ($data) {
                        return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="' . route('admin.user.business.view', $data->id) . '" class="btn btn-primary text-white" title="Edit">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="#" onclick="deleteAlert(' . $data->id . ')" class="btn btn-danger text-white" title="Delete">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>';
                    })

                    ->rawColumns(['image','action','status'])
                    ->make(true);
            }
            return view('web.backend.layout.business.index');
        } catch (Exception $e) {
            return redirect()->back()->with('t-error', 'Something went wrong! Please try again.');
        }
    }

    public function view($id)
    {
        try {
            $data = Verification::with('user')->find($id);
            return view('web.backend.layout.business.view', compact('data'));
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }

    public function destroy(string $id)
    {
        $data = Verification::find($id);

        if (!$data) {
            return response()->json(['t-success' => false, 'message' => 'Data not found.']);
        }
        $data->delete();
        return response()->json(['t-success' => true, 'message' => 'Deleted successfully.']);
    }

    
}
