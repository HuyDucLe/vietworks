<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Datatables;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(User::orderBy('id', 'asc')->get())
            ->addColumn('action', function($row){
                
                return '';
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.users');
    }
      
    public function store(Request $request)
    {  
        User::updateOrCreate(
                    [
                     'id' => $request->id
                    ],
                    [
                        'name' => $request-> name,
                        'sex' => $request-> sex,
                        'birthday' => date("Y-m-d",strtotime($request-> birthday)),
                        'phone' => $request-> phone,
                        'email' => $request-> email,
                        'password' => $request-> password,
                        'date_join' => (is_null($request->date_join)) ? substr(Carbon::now(),0,10) : $request->date_join,
                        //'avata' => ,
                        'role' => (is_null($request->role)) ? 'Candidate' : $request->role,
                    ]);    
        return response()->json(['success'=>'User saved successfully.']);
    }
      
    public function edit(Request $request)
    {   
        $post  = User::where('id',$request->id)->first();
        return Response()->json($post);
    }
      
    public function destroy(Request $request)
    {
        User::where('id',$request->id)->delete();
        return response()->json(['success', 'message'=>'User deleted successfully.']);
    }

 
}