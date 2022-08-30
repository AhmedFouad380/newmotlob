<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Models\ResultCode;
use App\Models\SkillsResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ResultCodeController extends Controller
{
    public function index(){

        return view('admin.ResultCode.index');
    }
    public function datatable(Request $request)
    {
        $data = ResultCode::orderBy('id', 'asc')->get();

        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('code', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->code . '</span>';
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

             ->addColumn('skills_results', function ($row) {
        $actions = ' <a href="' . url("skills_results/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> النتائج  </a>';
        return $actions;

    })

            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("ResultCode-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'skills_results','code', 'is_active'])
            ->make();

    }

    public function store(Request $request){


        $data = new ResultCode();
        $data->code=$request->code;
        $data->created_by=Auth::guard('admin')->id();
        $data->save();
        if($request->text){
            foreach ($request->text as $text){
                $SkillsResult = new SkillsResult();
                $SkillsResult->text=$text;
                $SkillsResult->result_code_id=$data->id;
                $SkillsResult->created_by=Auth::guard('admin')->id();
                $SkillsResult->save();
            }
        }
        return back()->with('message','success');
    }


    public function update(Request $request){


        $data =  ResultCode::find($request->id);
        $data->code=$request->code;
        $data->updated_by=Auth::guard('admin')->id();
        $data->save();
        SkillsResult::where('result_code_id',$request->id)->delete();
        if($request->text){
            foreach ($request->text as $text){
                $SkillsResult = new SkillsResult();
                $SkillsResult->text=$text;
                $SkillsResult->result_code_id=$data->id;
                $SkillsResult->created_by=Auth::guard('admin')->id();
                $SkillsResult->save();
            }
        }
        return redirect('ResultCode')->with('message','success');
    }


    public function edit($id)
    {
        $employee = ResultCode::findOrFail($id);
        return view('admin.ResultCode.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            ResultCode::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
