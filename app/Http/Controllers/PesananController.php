<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function viewList(Request $request)
    {
        $data = Pesanan::with('jadwal')->get();
        // dd($data);
        return view('list', ['data' => $data]);
    }

    public function viewListDetail(Request $request)
    {
        // if($request->nomor_lapangan != 'all'){
        //     $data = Pesanan::with('jadwal', 'nomor_lapangan'== $request->nomor_lapangan)->get();
        //     if($request->jam_pemakaian != 'all'){
        //         $data = Pesanan::with('jadwal', 'nomor_lapangan'== $request->nomor_lapangan, 'jam_mulai' == $request->jam_pemakaian)->get();
        //     }
        // }
        // else if($request->jam_pemakaian != 'all'){
        //     $data = Pesanan::with('jadwal', 'jam_mulai' == $request->jam_pemakaian)->get();
        // }
        // else{
        //     $data = Pesanan::with('jadwal')->where()->get();
        // }
        $data = Pesanan::with('jadwal')->where()->get();
        // dd($data);
        return view('list_detail', ['data' => $data]);
    }

    public function viewPesan()
    {
        $data = Jadwal::get();
        // dd($data);
        return view('form', ['data' => $data]);
    }

    public function storeBook(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required|string',
            'wa_pemesan' => 'required|string',
            'tanggal' => 'required|date',
            'nomor_lapangan' => 'required|string',
            'jam_pemakaian' => 'required|string',
        ]);

        $jadwal = Jadwal::where('jam_mulai', $request->jam_pemakaian)->where('nomor_lapangan', $request->nomor_lapangan)->first();
        $cek = Pesanan::where('jadwal_id', $jadwal->id)->where('tanggal', $request->tanggal)->first();

        if($cek){
            return redirect()->route('pesan.show')->with('error', 'Jadwal tidak available!');
        }

        $pesanan = new Pesanan();
        $pesanan->nama_pemesan = $request->nama_pemesan;
        $pesanan->wa_pemesan = $request->wa_pemesan;
        $pesanan->tanggal = $request->tanggal;
        $pesanan->jadwal_id = $jadwal->id;
        $pesanan->save();

        return redirect()->route('pesan.show')->with('success', 'Lapangan BERHASIL di Pesan!');
    }

    public function editView($id)
    {
        $data = Pesanan::with('jadwal')->findOrFail($id);
        return view('edit', ['data' => $data]);
    }

    public function editStore(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'nama_pemesan' => 'required|string',
            'wa_pemesan' => 'required|string',
            'tanggal' => 'required|date',
            'nomor_lapangan' => 'required|string',
            'jam_pemakaian' => 'required|string',
        ]);
        // dd($request);

        $jadwal = Jadwal::where('jam_mulai', $request->jam_pemakaian)->where('nomor_lapangan', $request->nomor_lapangan)->first();
        $pesanan = Pesanan::findOrFail($id);
        $cek = Pesanan::where('jadwal_id', $jadwal->id)->where('tanggal', $request->tanggal)->first();

        if($cek){
            return redirect()->route('pesan.show')->with('error', 'Jadwal tidak available!');
        }

        $pesanan->update([
            'nama_pemesan' => $request->nama_pemesan,
            'wa_pemesan' => $request->wa_pemesan,
            'tanggal' => $request->tanggal,
            'jadwal_id' => $jadwal->id,
        ]);

        return redirect()->route('list.show')->with('success', 'Pesanan BERHASIL di EDIT!');
    }

    public function deleteBook($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $pesanan->delete();

        return redirect()->route('list.show')->with('success', 'Pesanan BERHASIL di HAPUS!');
    }
}
