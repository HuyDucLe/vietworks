<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Company;
use Datatables;

class CompanyController extends Controller
{

    public function index()
    {
        if(request()->ajax()) {
            return datatables()->of(Company::orderBy('id', 'asc')->get())
            ->addColumn('action', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip" onClick="editFunc('.$row->id.')" data-original-title="Edit" class="edit btn btn-success edit"><i class="fas fa-pen"></i></a>';
                $btn = $btn.'<a href="javascript:void(0);" id="delete-company" onClick="deleteFunc('.$row->id.')" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger"><i class="fas fa-trash-alt"></i></a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('admin.companies');
    }
      
    public function store(Request $request)
    {  
        Company::updateOrCreate(
                    [
                     'id' => $request->id
                    ],
                    [
                    'name' => $request->name, 
                    'intro' => $request-> intro,
                    'logo' => $request-> logo,		
                    'employees' => $request-> employees,
                    'address' => $request-> address,	
                    'contact' => $request-> contact,
                    'website' => $request-> website,
                    'email' => $request-> email
                    ]);    
        return response()->json(['message'=>'Company saved successfully.']);
    }
      
    public function edit(Request $request)
    {   
        $company  = Company::where('id',$request->id)->first();
        return Response()->json($company);
    }
      
    public function destroy(Request $request)
    {
        Company::where('id',$request->id)->delete();
        return response()->json(['message'=>'Company deleted successfully.']);
    }
}