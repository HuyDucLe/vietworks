<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Datatables;
use App\Models\Company;
use App\Models\JobPost;
use App\Models\JobCate;
use App\Models\JobSave;
use App\Models\User;

class EmployeeController extends Controller
{
    public function checkRole() {
        if(session()->has('role'))
            if(session('role') == "Employee") return 1;
            else return 0;
        else return 0;;
    }

    public function list()
    {
        $post = JobPost::select('id', 'name', 'date_start', 'date_end', 
                        'salary_min', 'salary_max', 'number', 'position')
                        ->where('user',session()->get('uid'))
                        ->paginate(10);
        if($this->checkRole()) return view('employee.list',compact('post'));
        else return back()->with(['remessage' => 'Đường dẫn không hợp lệ']);
    }

    public function post()
    {
        $com = Company::select('id','name')->orderBy('name','asc')->get();
        $cate = JobCate::get();
        if($this->checkRole()) return view('employee.post',compact('cate','com'));
        else return back()->with(['remessage' => 'Đường dẫn không hợp lệ']);
    }

    public function edit($id)
    {
        $post = JobPost:: where('id',$id) ->first();
        $com = Company::select('id','name')->get();
        $cate = JobCate::get();
        if($this->checkRole()) return view('employee.post',compact('com','cate','post'));
        else return back()->with(['remessage' => 'Đường dẫn không hợp lệ']);
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
        return redirect('list')->with('success', 'Cập nhật thành công');
    }
    public function candidate($id)
    {
        // $info = User:: select('*')->get(10);
        $c = JobPost:: where('id',$id) ->first();
        $com = Company::where('id',$c->company)->first();
        $user = JobSave:: where('job',$c->id)->paginate(100);
        // join('users', 'user', '=', 'users.id');
        return view('employee.candidate',compact('com','c','user'));
    }

    public function info($id)
    {
        $info = User:: where('id',$id) ->first();
        return view('candidate.resume',compact('info'));
    }
    public function destroy($id)
    {
        Jobpost::where('id',$id)->delete();
        return back()->with(['success', 'message'=>'User deleted successfully.']);
    }
    public function accept($id)
    {
        $user = DB::table('job_saves')->where('id', $id )->update(['accepted' => '1']);
        return back();
    }
    public function deny($id)
    {
        $user = DB::table('job_saves')->where('id', $id )->update(['accepted' => '-1']);
        return back();
    }
}
