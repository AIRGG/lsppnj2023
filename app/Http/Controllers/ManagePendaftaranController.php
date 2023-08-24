<?php

namespace App\Http\Controllers;

use App\Models\MKabkot;
use App\Models\MKecamatan;
use App\Models\MProvinsi;
use App\Models\MUser;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ManagePendaftaranController extends Controller
{
    //
    public function pendaftaranShow(Request $request)
    {
        $data = MUser::where('level', '2')->get();
        return view('lsp.admin.pendaftaran.index', ['data' => $data]);
    }
    public function pendaftaranShowCreate(Request $request)
    {
    }
    public function pendaftaranShowEdit(Request $request)
    {
        $form_id = $request->query('id', '');

        $data = MUser::findOrFail($form_id);
        $dataProvinsi = MProvinsi::all();
        return view('lsp.admin.pendaftaran.edit', ['data' => $data, 'dataProvinsi' => $dataProvinsi]);
    }
    public function pendaftaranShowDetail(Request $request)
    {
        $form_id = $request->query('id', '');

        $data = MUser::findOrFail($form_id);
        return view('lsp.admin.pendaftaran.detail', ['data' => $data]);
    }
    public function pendaftaranProsesAdd(Request $request)
    {
    }
    public function pendaftaranProsesEdit(Request $request)
    {
        // $user = auth()->guard('user')->user();
        $id = $request->oldid;
        $user = MUser::find($id);

        $form_nama_user = $request->nama_user;
        $form_alamat_ktp = $request->alamat_ktp;
        $form_alamat_domisili = $request->alamat_domisili;
        $form_id_provinsi = $request->id_provinsi;
        $form_id_kabupaten = $request->id_kabupaten;
        $form_id_kecamatan = $request->id_kecamatan;
        $form_nohp = $request->nohp;
        $form_notelp = $request->notelp;
        $form_email = $request->email;
        $form_kewarganegaraan = $request->kewarganegaraan;
        $form_kewarganegaraan_neagra = $request->kewarganegaraan_neagra;
        $form_tgl_lahir = $request->tgl_lahir;
        $form_tempat_lahir = $request->tempat_lahir;
        $form_id_provinsi_lahir = $request->id_provinsi_lahir;
        $form_id_kotkab_lahir = $request->id_kotkab_lahir;
        $form_negara = $request->negara;
        $form_jk = $request->jk;
        $form_menikah = $request->menikah;
        $form_agama = $request->agama;
        $form_gambar = $request->gambar;
        $form_video = $request->video;

        $uid_gambar = Uuid::uuid4()->toString();
        $uid_video = Uuid::uuid4()->toString();

        $provinsi = MProvinsi::find($form_id_provinsi);
        $kabupaten = MKabkot::find($form_id_kabupaten);
        $kecamatan = MKecamatan::find($form_id_kecamatan);

        $provinsi_lahir = MProvinsi::find($form_id_provinsi_lahir);
        $kabupaten_lahir = MKabkot::find($form_id_kotkab_lahir);

        // -- FILING_USER -- \\
        $dir_file = '/files/';
        $dir_file_move = public_path() . $dir_file;
        File::makeDirectory($dir_file, $mode = 0777, true, true);

        $form_gambar_nama = $user->file_img;
        $form_video_nama = $user->file_video;

        if ($form_gambar != null) {
            $form_file = 'FILE_GAMBAR_' . $uid_gambar . '_.' . $form_gambar->extension();
            $form_gambar->move($dir_file_move, $form_file);
            $form_gambar_nama = $dir_file . $form_file;
        }
        if ($form_video != null) {
            // dd($form_video->originalName);
            $form_file = 'FILE_VIDEO_' . $uid_video . '_.' . $form_video->extension();
            // dd($form_video);
            $form_video->move($dir_file_move, $form_file);
            $form_video_nama = $dir_file . $form_file;
        }

        $table = MUser::find($id);
        $table->nama_user = $form_nama_user;
        $table->level = '2';
        $table->alamat_ktp = $form_alamat_ktp;
        $table->alamat_domisili = $form_alamat_domisili;
        $table->id_provinsi = $form_id_provinsi;
        $table->provinsi = $provinsi->name;
        $table->id_kabupaten = $form_id_kabupaten;
        $table->kabupaten = $kabupaten->name;
        $table->id_kecamatan = $form_id_kecamatan;
        $table->kecamatan = $kecamatan->name;
        $table->nohp = $form_nohp;
        $table->notelp = $form_notelp;
        $table->email = $form_email;
        $table->kewarganegaraan = $form_kewarganegaraan;
        $table->kewarganegaraan_negara = $form_kewarganegaraan_neagra;
        $table->tgl_lahir = $form_tgl_lahir;
        $table->tempat_lahir = $form_tempat_lahir;
        $table->id_provinsi_lahir = $form_id_provinsi_lahir;
        $table->provinsi_lahir = $provinsi_lahir->name;
        $table->id_kotkab_lahir = $form_id_kotkab_lahir;
        $table->kotkab_lahir = $kabupaten_lahir->name;
        $table->negara = $form_negara;
        $table->jk = $form_jk;
        $table->menikah = $form_menikah;
        $table->agama = $form_agama;
        $table->file_img = $form_gambar_nama;
        $table->file_video = $form_video_nama;
        $table->save();

        Session::flash('alert-success', 'Success Simpan Data'); // kasih pesan success
        return redirect()->route('manage.pendaftaran.index');
    }
    public function pendaftaranProsesDelete(Request $request)
    {
    }
}
