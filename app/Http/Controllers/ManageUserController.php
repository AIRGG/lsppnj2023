<?php

namespace App\Http\Controllers;

use App\Models\MUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManageUserController extends Controller
{
    //
    public function userShow(Request $request)
    {
        $data = MUser::where('level', '2')->get();
        return view('lsp.admin.user.index', ['data' => $data]);
    }
    public function userShowCreate(Request $request)
    {
        return view('lsp.admin.user.create');
    }
    public function userShowEdit(Request $request)
    {
        $form_id = $request->query('id', '');

        $data = MUser::findOrFail($form_id);
        return view('lsp.admin.user.edit', ['data' => $data]);
    }
    public function userShowDetail(Request $request)
    {
        $form_id = $request->query('id', '');

        $data = MUser::findOrFail($form_id);
        return view('lsp.admin.user.detail', ['data' => $data]);
    }
    public function userProsesAdd(Request $request)
    {
        $form_username = $request->username;
        $form_password = $request->password;
        $form_nama_user = $request->nama_user;

        $table = new MUser();
        $table->username = $form_username;
        $table->password = $form_password;
        $table->nama_user = $form_nama_user;
        $table->save();
        Session::flash('alert-success', 'Success Add Data'); // kasih pesan success
        return redirect()->route('manage.user.index');
    }
    public function userProsesEdit(Request $request)
    {
        $form_id = $request->id;
        $table = MUser::findOrFail($form_id);

        $form_username = $request->username;
        $form_password = $request->password;
        $form_nama_user = $request->nama_user;

        $table->username = $form_username;
        $table->password = $form_password;
        $table->nama_user = $form_nama_user;
        $table->save();
        Session::flash('alert-success', 'Success Edit Data'); // kasih pesan success
        return redirect()->route('manage.user.index');
    }
    public function userProsesDelete(Request $request)
    {
        $form_id = $request->query('id', '');
        $table = MUser::findOrFail($form_id);
        $table->delete();

        Session::flash('alert-success', 'Success Delete Data'); // kasih pesan success
        return redirect()->route('manage.user.index');
    }
}
