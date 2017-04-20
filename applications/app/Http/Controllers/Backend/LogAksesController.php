<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\LogAkses;
use App\Models\Users;

class LogAksesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $getLogAkses = LogAkses::join('amd_users', 'amd_users.id', '=', 'amd_log_akses.actor')
                                ->select('amd_log_akses.*', 'amd_users.name as actor_name')
                                ->orderBy('amd_log_akses.created_at', 'desc')
                                ->get();

        return view('backend.logAkses.index', compact('getLogAkses'));
    }
}
