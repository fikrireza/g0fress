<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Inbox;

class InboxController extends Controller
{


    public function index()
    {
        $getInbox = Inbox::orderBy('created_at', 'desc')->get();

        return view('backend.inbox.index', compact('getInbox'));
    }
}
