<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\JobCate;
use Datatables;

class CateController extends Controller
{

    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(JobCate::orderBy('id', 'asc')->get())
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" onClick="editFunc('.$row->id.')" data-original-title="Edit" class="edit btn btn-success edit"><i class="fas fa-pen"></i></a>';
                $btn = $btn.'<a href="javascript:void(0);" id="delete-JobCate" onClick="deleteFunc('.$row->id.')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger"><i class="fas fa-trash-alt"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.categories');
    }
      
    public function store(Request $request)
    {  
        JobCate::updateOrCreate(
                    [ 'id' => $request->id ],
                    [ 'name' => $request->name,  ]);    
        return response()->json(['message'=>'Job Category saved successfully.']);
    }
      
    public function edit(Request $request)
    {   
        $JobCate  = JobCate::where('id',$request->id)->first();
        return Response()->json($JobCate);
    }
      
    public function destroy(Request $request)
    {
        JobCate::where('id',$request->id)->delete();
        return response()->json(['message'=>'Job Category deleted successfully.']);
    }
}