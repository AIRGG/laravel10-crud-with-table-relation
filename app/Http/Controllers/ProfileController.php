<?php

namespace App\Http\Controllers;

use App\Models\MProfile;
use App\Models\MRole;
use App\Models\MUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function profileShow(Request $request)
    {
        $data = MProfile::all();
        return view('profile.index', ['data' => $data]);
    }
    public function profileShowCreate(Request $request)
    {
        $dataRole = MRole::all();
        return view('profile.create', ['dataRole' => $dataRole]);
    }
    public function profileShowEdit(Request $request)
    {
        $oldid = $request->query('oldid');

        $data = MProfile::findOrFail($oldid);
        $dataRole = MRole::all();
        return view('profile.edit', ['data' => $data, 'dataRole' => $dataRole]);
    }
    public function profileShowDetail(Request $request)
    {

    }
    public function profileProsesAdd(Request $request)
    {
        $oldid = $request->post('oldid');

        // -- ambil dari form
        $form_nama = $request->post('nama');
        $form_nohp = $request->post('nohp');
        $form_alamat = $request->post('alamat');
        $form_username = $request->post('username');
        $form_password = $request->post('password');
        $form_role = $request->post('role');

        // -- set ke table
        $tblUser = new MUser();
        $tblUser->username = $form_username;
        $tblUser->password = Hash::make($form_password);
        $tblUser->id_role = $form_role;
        $tblUser->save(); // doing save here..

        $tblProfile = new MProfile();
        $tblProfile->nama = $form_nama;
        $tblProfile->nohp = $form_nohp;
        $tblProfile->alamat = $form_alamat;
        $tblProfile->id_user = $tblUser->id_user;
        $tblProfile->save(); // doing save here..

        Session::flash('alert-success', 'Success Add Data'); // kasih pesan success
        return redirect()->route('profile.index');
    }
    public function profileProsesEdit(Request $request)
    {
        $oldid = $request->post('oldid');

        // -- ambil dari form
        $form_nama = $request->post('nama');
        $form_nohp = $request->post('nohp');
        $form_alamat = $request->post('alamat');
        $form_username = $request->post('username');
        $form_password = $request->post('password');
        $form_role = $request->post('role');

        // -- set ke table
        $tblProfile = MProfile::find($oldid);
        $tblProfile->nama = $form_nama;
        $tblProfile->nohp = $form_nohp;
        $tblProfile->alamat = $form_alamat;
        $tblProfile->save(); // doing save here..

        $tblUser = MUser::find($tblProfile->id_user);
        $tblUser->username = $form_username;
        if($form_password != '') {
            $tblUser->password = Hash::make($form_password);
        }
        $tblUser->id_role = $form_role;
        $tblUser->save(); // doing save here..

        Session::flash('alert-success', 'Success Edit Data'); // kasih pesan success
        return redirect()->route('profile.index');
    }
    public function profileProsesDelete(Request $request)
    {
        $oldid = $request->query('oldid');
        $tblProfile = MProfile::findOrFail($oldid);
        $tblUser = MUser::findOrFail($tblProfile->id_user);
        $tblProfile->delete();
        $tblUser->delete();

        Session::flash('alert-success', 'Success Delete Data'); // kasih pesan success
        return redirect()->route('profile.index');
    }
}
