<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Page;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class QuestionController extends Controller
{
    public function index(){

        return view('admin.Skills.index');
    }
    public function datatable(Request $request)
    {
        $data = Question::orderBy('id', 'asc')->get();

        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('question', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->question . '</span>';
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
            ->addColumn('answers', function ($row) {
                $actions = ' <a href="' . url("Answers/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> الاجابات  </a>';
                return $actions;

            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("Skills-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'question', 'is_active','answers'])
            ->make();

    }

    public function store(Request $request){


        $data = new Question();
        $data->question=$request->question;
        $data->sort=$request->sort;
        $data->is_active=$request->is_active;
        $data->created_by=Auth::guard('admin')->id();
        $data->save();

        foreach($request->descriptions as  $key => $des){
            $Answer = new Answer();
            $Answer->answer=$des;
            $Answer->type=$request->type[$key];
            $Answer->is_active='active';
            $Answer->question_id=$data->id;
            $Answer->save();
        }
        return back()->with('message','success');
    }


    public function update(Request $request){


        $data =  Question::find($request->id);
        $data->question=$request->question;
        $data->sort=$request->sort;
        $data->is_active=$request->is_active;
        $data->updated_by=Auth::guard('admin')->id();
        $data->save();

        return back()->with('message','success');
    }


    public function edit($id)
    {
        $employee = Question::findOrFail($id);
        return view('admin.Skills.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            Question::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
