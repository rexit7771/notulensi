<?php

namespace App\Http\Controllers;

use App\Models\Notulensi;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContinueController extends Controller
{
    public function index()
    {   
        // $data = Notulensi::where('status', 'OnProgress')->get();

        $data = Notulensi::all();
        
        return view('continue.index', compact('data'));
    }

    public function edit($id)
    {
        
        $notulensi = Notulensi::where('id', $id)->first();

        $detail = Detail::where('notul_id', $id)->get();
        
        return view('continue.edit', compact('notulensi', 'detail', 'id'));
    }

    public function update(Request $request)
    {
        // return $request;
        $data = $request->all();
        \DB::table('notulensi')->where('id', $request->id)
        ->update([
            'tgl_meeting'   => $request->tgl_meeting,
            'section'       => $request->section,
            'subjek'        => $request->subjek,
            'task_id'       => $request->task_id,
            'progress'      => $request->progress,
            'peserta'       => $request->peserta,
        ]);

        $getId = $request->notulensi_id;
        
        if (count($data['task'] ) > 0 )
        {   
            Detail::where('notul_id', $request->notulensi_id)->delete();

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

        toastr()->success('Data berhasil diedit');
        return redirect()->to('/continue');
    }

    public function detail($id)
    {
        $notulensi = Notulensi::where('id', $id)->first();
        $detail = Detail::where('notul_id', $id)->get();
        
        return view('report.detail', compact('notulensi', 'detail', 'id'));
    }

    public function delete($id)
    {
        Notulensi::where('id', $id)->delete();

        toastr()->success('Data Berhasil dihapus');
        return redirect('/continue');
    }

}
