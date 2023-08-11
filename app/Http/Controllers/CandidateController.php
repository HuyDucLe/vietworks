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

class CandidateController extends Controller
{
    public function checkRole() {
        if(session()->has('role'))
            if(session('role') == "Candidate" || session('role') == "Employee") return 1;
            else return 0;
        else return 0;
    }
    

    public function resume ()
    {
        if($this->checkRole()) return view('candidate.resume');
        
        return view('company-detail',compact('com','post'));
    }

    public function apply ($id)
    {
        $c = JobPost:: where('id',$id) ->first();
        $com = Company::where('id',$c->company)->first();
        $user = $user = JobSave:: where('job',$c->id)->paginate(100);
        return view('candidate.cv',compact('c','com'));
    }

    protected function cv(Request $request) {

        $path = $request->file('cv')->store('img');
        $url = "storage/app/".$path;
        JobSave::updateOrCreate([
                    'job' => $request->id,
                    'user' => session()->get('uid'),
                    'saved' => 1,
                    'applied' => 1,    
                    'accepted' => 0, 
                    'cv' => $url,
                ]);
        return redirect(url('search'));
    }

    public function job()
    {
        // $user = JobSave:: where('user',session()->get('uid'));
        $post = JobPost:: where('user',session()->get('uid'))->get(); 
        $post = JobPost:: join('job_saves', 'job_posts.id', '=', 'job_saves.job')
                            ->where('job_saves.user',session()->get('uid'))
                            ->get();
        if($this->checkRole()) return view('candidate.job', compact('post'));
        else return back()->with(['remessage' => 'Đường dẫn không hợp lệ']);
    }


}
