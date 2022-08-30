<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StateController extends Controller
{
    public function index($id)
    {
        return view('admin.State.index',compact('id'));
    }

    public function datatable(Request $request)
    {
        $data = State::orderBy('id', 'asc');
        if($request->city_id){
            $data->where('city_id',$request->city_id);
        }
        $data->get();
        return Datatables::of($data)
            ->addColumn('checkbox', function ($row) {
                $checkbox = '';
                $checkbox .= '<div class="form-check form-check-sm form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" value="' . $row->id . '" />
                                </div>';
                return $checkbox;
            })
            ->editColumn('name', function ($row) {
                $name = '';
                $name .= ' <span class="text-gray-800 text-hover-primary mb-1">' . $row->name . '</span>';
                return $name;
            })
            ->editColumn('city_id', function ($row) {
                $data = $row->City->name;
                if($data){
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
                $actions = ' <a href="' . url("State-edit/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> تعديل </a>';
                return $actions;

            })

            ->addColumn('Village', function ($row) {
                $actions = ' <a href="' . url("Village/" . $row->id) . '" class="btn btn-active-light-info"><i class="bi bi-pencil-fill"></i> القرى </a>';
                return $actions;

            })
            ->rawColumns(['actions', 'checkbox', 'name', 'is_active','Village'])
            ->make();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $b = $this->validate(request(), [
            'name' => 'required|string',
            'city_id' => 'required|exists:cities,id',
            'is_active' => 'nullable|string',

        ]);
        if($request->is_active == 1){
            $active =  'active';
        }else{
            $active = 'inactive';
        }
        $data = new State();
        $data->name=$request->name;
        $data->city_id=$request->city_id;
        $data->is_active= $active;
        $data->save();


        return redirect()->back()->with('message', 'تم الاضافة بنجاح ');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = State::findOrFail($id);
        return view('admin.State.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string',
            'is_active' => 'nullable',

        ]);
        if($request->is_active == 1){
            $active=  'active';
        }else{
            $active= 'inactive';
        }

        $data = State::find($request->id);
        $data->name=$request->name;
        $data->is_active=$active;
        $data->save();


        return redirect('State/'.$data->city_id)->with('message', 'تم التعديل بنجاح ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            State::whereIn('id', $request->id)->delete();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed']);
        }
        return response()->json(['message' => 'Success']);
    }




    public function getState($id){
        $data = State::where('city_id',$id)->get();

        return view('admin.City.modelShow', compact('data'));

    }
}
