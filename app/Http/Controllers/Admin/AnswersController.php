<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AnswersController extends Controller
{
    public function index($id)
    {

        return view('admin.Answers.index', compact('id'));
    }

    public function datatable(Request $request)
    {
        $data = Answer::orderBy('id', 'asc')->where('question_id', $request->question_id)->get();

        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('answer', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->answer . '</span>';
                return $name;
            })
            ->editColumn('type', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->type . '</span>';
                return $name;
            })
            ->editColumn('created_by', function ($row) {
                $data = $row->CreatedBy->name;
                if ($data) {
                    return $data;
                } else {
                    return '';
                }
            })
            ->editColumn('updated_by', function ($row) {

                if ($row->updated_by) {
                    $data = $row->UpdatedBy->name;

                    return $data;
                } else {
                    return '';
                }
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . url("Answers-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'answer', 'type'])
            ->make();

    }

    public function store(Request $request)
    {
        $Answer = new Answer();
        $Answer->answer = $request->answer;
        $Answer->type = $request->type;
        $Answer->is_active = 'active';
        $Answer->question_id = $request->question_id;
        $Answer->created_by = Auth::guard('admin')->id();
        $Answer->save();

        return back()->with('message', 'success');
    }


    public function update(Request $request)
    {


        $data = Answer::find($request->id);
        $data->answer = $request->answer;
        $data->type = $request->type;
        $data->updated_by = Auth::guard('admin')->id();
        $data->save();

        return redirect('Answers/' . $data->question_id)->with('message', 'success');
    }


    public function edit($id)
    {
        $employee = Answer::findOrFail($id);
        return view('admin.Answers.edit', compact('employee'));
    }

    public function destroy(Request $request)
    {
        try {
            Answer::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }
}
