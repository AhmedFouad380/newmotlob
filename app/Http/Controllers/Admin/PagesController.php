<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PagesController extends Controller
{
    public function index(){

        return view('admin.Pages.index');
    }
    public function datatable(Request $request)
    {
        $data = Page::orderBy('id', 'asc')->get();

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

            ->editColumn('created_by', function ($row) {
                $data = $row->CreatedBy->name;
                if($data){
                    return $data;
                }else{
                    return '';
                }
            })
            ->editColumn('updated_by', function ($row) {

                if($row->updated_by){
                    $data = $row->UpdatedBy->name;

                    return $data;
                }else{
                    return '';
                }
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
                $actions = ' <a href="' . url("Pages-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'title', 'is_active'])
            ->make();

    }

    public function store(Request $request){


        $data = new Page();
        $data->title=$request->title;
        $data->description=$request->description;
        $data->is_active=$request->is_active;
        $data->type=$request->type;
        $data->created_by=Auth::guard('admin')->id();
        $data->image=$request->image;
        $data->save();

        return back()->with('message','success');
    }


    public function update(Request $request){


        $data =  Page::find($request->id);
        $data->title=$request->title;
        $data->description=$request->description;
        $data->is_active=$request->is_active;
        $data->type=$request->type;

        $data->updated_by=Auth::guard('admin')->id();
        $data->image=$request->image;
        $data->save();

        return back()->with('message','تم العملية بنجاح');
    }


    public function edit($id)
    {
        $employee = Page::findOrFail($id);
        return view('admin.Pages.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            Page::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
