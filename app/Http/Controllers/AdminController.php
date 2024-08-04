<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * view admin page
     */
    public function dashboard()
    {
        return view('layouts.admin.dashboard' , [
            'user' => Auth::user(),
            'reports' => Report::all()
        ]);
    }
}
