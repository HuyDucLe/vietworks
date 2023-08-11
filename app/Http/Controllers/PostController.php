<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\JobPost;
use App\Models\Company;
use App\Models\User;
use Datatables;

class PostController extends Controller
{

    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(JobPost::orderBy('id', 'asc')->get())
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" onClick="editFunc('.$row->id.')" data-original-title="Edit" class="edit btn btn-success edit"><i class="fas fa-pen"></i></a>';
                $btn = $btn.'<a href="javascript:void(0);" id="delete" onClick="deleteFunc('.$row->id.')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger"><i class="fas fa-trash-alt"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $com = Company::select('id')->orderBy('name','asc')->get();
        $user = User::select('id')->orderBy('name','asc')->get();
        return view('admin.posts',compact('com','user'));
    }
      
    public function store(Request $request)
    {  
        JobPost::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'name' => $request-> name,           
                    'job' => $request-> job,
                    'user' => $request-> user,
                    'company' => $request-> company,
                    'date_start' => $request-> date_start,
                    'date_end' => $request-> date_end,
                    'salary_min' => $request-> salary_min,
                    'salary_max' => $request-> salary_max,
                    'number' => $request-> number,
                    'sex' => $request-> sex,
                    'position' => $request-> position,
                    'location' => $request-> location,
                    'exp' => $request-> exp,
                    'requirements' => $request-> requirements,
                    'des' => $request-> des,
                    'benefit' => $request-> benefit,
                    'access' => $request-> access,
                    'public' => $request-> public,
                ]);    
        return response()->json(['success'=>'Post saved successfully.']);
    }
      
    public function edit(Request $request)
    {   
        $post  = JobPost::where('id',$request->id)->first();
        return Response()->json($post);
    }
      
    public function destroy(Request $request)
    {
        JobPost::where('id',$request->id)->delete();
        return response()->json(['success', 'message'=>'Post deleted successfully.']);
    }
}