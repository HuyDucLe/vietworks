<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\JobCate;
use App\Models\JobSave;
use App\Models\User;

class GuestController extends Controller
{
    public function home()
    {
        $temp1 = JobPost::select('id')->where('date_end','>','2023-3-1')->count();
        $temp2 = Company::select('id')->count();
        $temp3 = JobSave::select('id')->count();
        $banner = [$temp1,$temp2,'mem'=>1500,'get'=> 500];
        // $com = JobPost::orderBy('date_end','asc')->take(5)->get();
        $com =  JobPost::join('companies', 'company', '=', 'companies.id')
                ->join('job_positions', 'job_positions.name', '=', 'job_posts.position')
                ->select('job_posts.*', 'companies.name as cname','companies.logo as clogo', 'job_positions.id as pid')
                ->orderBy('date_end','asc')
                ->take(5)
                ->get();
        $pos = DB::table('job_positions')->pluck('name');
        $cate = JobCate::orderBy('id','asc')->get();
        // $user = User::orderBy('name','asc')->get();
        return view('index', compact('banner','com','cate','pos'));
    }
    public function search()
    {
        $com =  JobPost::join('companies', 'company', '=', 'companies.id')
                ->join('job_positions', 'job_positions.name', '=', 'job_posts.position')
                ->select('job_posts.*', 'companies.name as cname','companies.logo as clogo')
                ->orderBy('date_end','asc')
                ->paginate(10);
        $pos = DB::table('job_positions')->pluck('name');
        $cate = JobCate::pluck('name');
        // $user = User::orderBy('name','asc')->get();
        return view('browse-job', compact('com','cate','pos'));
    }
    public function getsearch(Request $request)
    {
        $com = DB::table('job_posts')
        ->join('companies', 'company', '=', 'companies.id')
        ->join('job_positions', 'job_positions.name', '=', 'job_posts.position')
        ->select('job_posts.*', 'companies.name as cname','companies.logo as clogo', 'job_positions.id as pid')
        ->where('pid',$request->job) 
        ->paginate(10);
        // return view('browse-job',compact('com'));
        
        // Search in the title and body columns from the posts table
        
        // if (($request->get('search') == '')&&($request->get('pos') == '')&&($request->get('job') == ''))return view('search');
        // else{
        //     $pos = DB::table('job_positions')->pluck('name');
        //     $cate = DB::table('job_cates')->pluck('name');
        //     $com = JobPost::FullTextSearch('name, des', $search)
        //     >join('companies', 'company', '=', 'companies.id')
        //     ->select('job_posts.*', 'companies.name as cname','companies.logo as clogo')
        //     // ->where('pid',$request->job) 
        //     ->paginate(10);
        
        //     // Return the search view with the resluts compacted
        //     return view('browse-job',compact('search','com','pos','cate'));
        // }

        $com = DB::table('job_posts')
                ->join('companies', 'companys', '=', 'companies.id')
                ->select('*', 'companies.name as cname','companies.logo as clogo')
                ->where('pid',$request->job) 
                ->paginate(10);
        $cate = DB::table('job_cates')->pluck('name');
        $pos = DB::table('job_positions')->pluck('name');
        return view('browse-job',compact('com','pos','cate'));
    }
    public function detail($id)
    {
        $com = JobPost:: where('id',$id) ->first();
        $p = Company::where('id',$com->company)->first();
        return view('company-detail',compact('com','p'));
    }
}
