<?php

namespace App\Http\Controllers;

use App\Models\Notulensi;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{
    public function index()
    {

        // $detail = Detail::all();

        return view('new.index');
    }

    public function store(Request $request){
        // return $request;
        $data = $request->all();
        $getId = Notulensi::insertGetId([
            'tgl_meeting'   => $request->tgl_meeting,
            'section'       => $request->section,
            'subjek'        => $request->subjek,
            'task_id'       => $request->task_id,
            'progress'      => $request->progress,
            'peserta'       => $request->peserta,
        ]);
        // return $getId;

        if (count($data['task'] ) > 0 )
        {
            foreach($data['task'] as $key => $value) {
                $dt = [
                'notul_id'  => $getId,
                'task'      => $data['task'][$key],
                'pic'       => $data['pic'][$key],
                'deadline'  => $data['deadline'][$key],
                'status'    => $data['status'][$key],
                ];
                Detail::create($dt);
            }
        }
        // return $getId;
        

        toastr()->success("Data Telah Diinput");
        return redirect()->to('/');
    }
}
