<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class JobsController extends Controller
{
    public function index()
    {

        return view('admin.Job.index');
    }

    public function datatable(Request $request)
    {
        $data = Job::orderBy('id', 'desc');

        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('title', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->title . '</span>';
                return $name;
            })

            ->addColumn('company', function ($row) {
                if ($row->Company) {
                    $data = $row->Company->company_name;
                    return $data;
                } else {
                    return '';
                }
            })
            ->addColumn('company_type', function ($row) {
                if ($row->Company->type == 'private') {
                    $data = 'شركة خاصة'	;
                    return $data;
                } else if($row->Company->type == 'employment'){
                    $data = 'شركة توظيف'	;
                    return $data;
                }
            })
            ->addColumn('ExperienceCategory', function ($row) {
                if ($row->ExperienceCategory) {
                    $data = $row->ExperienceCategory->name;
                    return $data;
                } else {
                    return '';
                }
            })
            ->editColumn('created_at', function ($row) {
                $name = Carbon::parse($row->created_at)->format('Y-m-d');
                $name .='<br>';
                $name .= Carbon::parse($row->created_at)->format('H:m');
                return $name;
            })

            ->editColumn('is_active', function ($row) {
                $is_active = '<div class="badge badge-light-success fw-bolder">مفعل</div>';
                $not_active = '<div class="badge badge-light-danger fw-bolder">غير مفعل</div>';
                if ($row->is_active == 'active') {
                    return $is_active;
                } else {
                    return $not_active;
                }
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("JobRequests/" . $row->id) . '" class="btn btn-success"><i class="bi bi-eye    "></i> المتقدمين </a>';

                $actions .= ' <a href="' . url("Jobs-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions','company_type', 'checkbox', 'title', 'is_active','created_at'])
            ->make();

    }

    public function store(Request $request)
    {

        $data = new Job();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->is_active = $request->is_active;
        $data->created_by = Auth::guard('admin')->id();
        $data->image = $request->image;
        $data->save();

        return back()->with('message', 'success');
    }


    public function update(Request $request)
    {

        $data = Job::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->is_active = $request->is_active;
        $data->updated_by = Auth::guard('admin')->id();
        $data->image = $request->image;
        $data->save();

        return back()->with('message', 'success');
    }


    public function edit($id)
    {
        $employee = Job::findOrFail($id);
        return view('admin.Job.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            Job::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);

    }
}
