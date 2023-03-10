<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Rekap;
class DashboardController extends Controller
{
    public function index()
    {

        $fil = Request()->fil;
         $tahunAjaran = session()->get('tahun_ajaran');
        $semester = session()->get('semester');
        if (Request()->tahun_ajaran) {
            $tahunAjaran = Request()->tahun_ajaran;
            $semester = Request()->semester;
        }

        $siswa = Siswa::with(['kelas','kelas.tahunAjaran'])->whereHas('kelas.tahunAjaran',function ($query) use ($tahunAjaran){
        $query->where('tahun_ajaran',$tahunAjaran);
       })->count();

        $kelas = Kelas::with("tahunAjaran")->whereHas("tahunAjaran",function($q)use($semester,$tahunAjaran){
            $q->where('tahun_ajaran',$tahunAjaran);
        })->count();
        $jurusan = Jurusan::count();
        $rekap = Rekap::with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran,$semester){
        $query->where('tahun_ajaran',$tahunAjaran)->where('semester',$semester);
       })->whereMonth('tanggal',$fil?$fil:date('m'))->count();


        $sakit = Rekap::with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran,$semester){
        $query->where('tahun_ajaran',$tahunAjaran)->where('semester',$semester);
       })->where('status','sakit')->whereMonth('tanggal',$fil?$fil:date('m'))->count();

        $izin = Rekap::with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran,$semester){
        $query->where('tahun_ajaran',$tahunAjaran)->where('semester',$semester);
       })->where('status','izin')->whereMonth('tanggal',$fil?$fil:date('m'))->count();

        $alpa = Rekap::with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran,$semester){
        $query->where('tahun_ajaran',$tahunAjaran)->where('semester',$semester);
       })->where('status','alpa')->whereMonth('tanggal',$fil?$fil:date('m'))->count();
       
       $telat = Rekap::with(['tahunAjaran'])->whereHas('tahunAjaran',function ($query) use ($tahunAjaran,$semester){
        $query->where('tahun_ajaran',$tahunAjaran)->where('semester',$semester);
       })->where('status','terlambat')->whereMonth('tanggal',$fil?$fil:date('m'))->count();

        return view('dashboard.index',compact('siswa','kelas','jurusan','rekap','sakit','izin','alpa','fil','telat'));
    }
}
