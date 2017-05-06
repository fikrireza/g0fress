<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Inbox;
use DB;

class InboxController extends Controller
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
        $getInbox = Inbox::orderBy('created_at', 'desc')->get();

        $setRead = DB::table('amd_inbox')->where('read', 0)->update(['read' => 1]);

        return view('backend.inbox.index', compact('getInbox'));
    }
}
