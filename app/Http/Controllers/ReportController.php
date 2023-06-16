<?php

namespace App\Http\Controllers;

use App\Models\Notulensi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {   
        $data = Notulensi::all();

        return view('report.index', compact('data'));
    }
}
