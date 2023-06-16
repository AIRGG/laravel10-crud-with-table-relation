<?php

namespace App\Http\Controllers;

use App\Models\MRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    //
    public function roleShow(Request $request)
    {
        $data = MRole::all();
        return view('role.index', ['data' => $data]);
    }
    public function roleShowCreate(Request $request)
    {
        return view('role.create');
    }
    public function roleShowEdit(Request $request)
    {
        $oldid = $request->query('oldid');

        $data = MRole::findOrFail($oldid);
        return view('role.edit', ['data' => $data]);
    }
    public function roleShowDetail(Request $request)
    {

    }
    public function roleProsesAdd(Request $request)
    {
        $oldid = $request->post('oldid');

        // -- ambil dari form
        $form_nama_role = $request->post('nama_role');

        // -- set ke table
        $tblRole = new MRole();
        $tblRole->nama_role = $form_nama_role;

        $tblRole->save(); // doing save here..

        Session::flash('alert-success', 'Success Add Data'); // kasih pesan success
        return redirect()->route('role.index');
    }
    public function roleProsesEdit(Request $request)
    {
        $oldid = $request->post('oldid');

        // -- ambil dari form
        $form_nama_role = $request->post('nama_role');

        // -- set ke table
        $tblRole = MRole::find($oldid);
        $tblRole->nama_role = $form_nama_role;

        $tblRole->save(); // doing save here..

        Session::flash('alert-success', 'Success Edit Data'); // kasih pesan success
        return redirect()->route('role.index');
    }
    public function roleProsesDelete(Request $request)
    {
        $oldid = $request->query('oldid');
        $tblRole = MRole::findOrFail($oldid);
        $tblRole->delete();

        Session::flash('alert-success', 'Success Delete Data'); // kasih pesan success
        return redirect()->route('role.index');
    }
}
