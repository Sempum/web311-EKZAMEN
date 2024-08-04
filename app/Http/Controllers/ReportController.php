<?php

namespace App\Http\Controllers;

use App\Mail\ReportMail;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    public function storeReport(Request $request)
    {
        $request->validate([
            'name'  => 'required|min:3',
            'email' => 'required|email',
            'topic' => 'required|min:6',
            'message' => 'required|min:6',
        ]);

        Report::create($request->all());
        Mail::to($request->email)->send(new ReportMail($request->name));

        return back();
    }

    public function fixReport(Report $report)
    {
        $report->fix();
        return back();
    }
}
