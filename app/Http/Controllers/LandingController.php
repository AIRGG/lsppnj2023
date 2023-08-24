<?php

namespace App\Http\Controllers;

use App\Models\MBarang;
use App\Models\MPermintaanBarang;
use App\Models\MTrxBarang;
use App\Models\MTrxBarangPindah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\MKelas;
use App\Models\MJurusan;
use App\Models\MKabkot;
use App\Models\MKecamatan;
use App\Models\MProdi;
use App\Models\MMahasiswa;
use App\Models\MLogin;
use App\Models\MProvinsi;

class LandingController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('lsp.index');

        // $ldate = date('H:i:s');
        // $tgl = Carbon::now()->translatedFormat('l, d F Y');
        // $waktu = Carbon::now()->translatedFormat('H:i:s');
        // return view('landing.index', ['waktu' => $waktu, 'tanggal' => $tgl]);
    }
    public function prosesLogin(Request $request)
    {
        $form_username = $request->input('username');
        $form_password = $request->input('password');
        $attempt = auth()->guard('user')->attempt(['username' => $form_username, 'password' => $form_password]);
        $cek = auth()->guard('user')->check();
        if ($attempt) {
            $user = auth()->guard('user')->user();
            $level = $user->level;
            if ($level == '1') { // jikad admin
                return redirect()->route('dashboard.admin');
            } else
                return redirect()->route('dashboard.user');
        }
        return redirect()->back()->with('error', 'Username atau Password Salah');
    }
    public function prosesLogout(Request $request)
    {
        Auth::guard('user')->logout();
        $viewRedirect = '/';
        $request->session()->regenerate();
        return redirect()->intended('/');
    }
    public function daftar(Request $request)
    {
        return view('lsp.daftar');

        // $ldate = date('H:i:s');
        // $tgl = Carbon::now()->translatedFormat('l, d F Y');
        // $waktu = Carbon::now()->translatedFormat('H:i:s');
        // return view('landing.index', ['waktu' => $waktu, 'tanggal' => $tgl]);
    }

    public function dashboardAdmin(Request $request)
    {
        return view('lsp.admin.index');
    }
    public function dashboardUser(Request $request)
    {
        return view('lsp.user.index');
    }
    public function dataProvinsi(Request $request)
    {
        $data = MProvinsi::all();
        return response()->json($data);
    }
    public function dataKabkot(Request $request)
    {
        $id = $request->query('id');
        $data = MKabkot::where('province_id', $id)->get();
        return response()->json($data);
    }
    public function dataKecamatan(Request $request)
    {
        $id = $request->query('id');
        $data = MKecamatan::where('regency_id', $id)->get();
        return response()->json($data);
    }
}
