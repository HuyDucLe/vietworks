<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    public function checkRole() {
        if(session()->has('role'))
            if(session('role') == "Admin") return 1;
            else return 0;
        else return 0;;
    }
    public function table()
    {
        if($this->checkRole()) return view('admin.index');
        else return back()->with(['remessage' => 'Đường dẫn không hợp lệ']);
    }

    public function index($ql)
    {
        if($this->checkRole()) {
            $table = DB::table($ql)->paginate(25);
            $col = Schema::getColumnListing($ql);
            return view('admin.table',compact('ql','col','table'));
        }
        else return back()->with(['remessage' => 'Đường dẫn không hợp lệ']);        
    }
}
