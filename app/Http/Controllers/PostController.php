<?php

namespace App\Http\Controllers;

use App\Models\MPost;
use App\Models\MUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    //
    public function postShow(Request $request)
    {
        $data = MPost::all();
        return view('post.index', ['data' => $data]);
    }
    public function postShowCreate(Request $request)
    {
        $dataUser = MUser::all();
        return view('post.create', ['dataUser' => $dataUser]);
    }
    public function postShowEdit(Request $request)
    {
        $oldid = $request->query('oldid');

        $data = MPost::findOrFail($oldid);
        $dataUser = MUser::all();
        return view('post.edit', ['data' => $data, 'dataUser' => $dataUser]);
    }
    public function postShowDetail(Request $request)
    {

    }
    public function postProsesAdd(Request $request)
    {
        $oldid = $request->post('oldid');

        // -- ambil dari form
        $form_title = $request->post('title');
        $form_user = $request->post('user');
        $form_picture = $request->file('picture');

        // dd($form_picture);
        // -- image
        $filename = '';
        if($form_picture && $form_picture->getSize() > 0) {
            $filename = $form_picture->hashName();
            $form_picture->move(public_path('posts'), $filename);
        }

        // -- set ke table
        $tblPost = new MPost();
        $tblPost->title = $form_title;
        $tblPost->id_user = $form_user;
        $tblPost->picture = $filename;
        $tblPost->save(); // doing save here..

        Session::flash('alert-success', 'Success Add Data'); // kasih pesan success
        return redirect()->route('post.index');
    }
    public function postProsesEdit(Request $request)
    {
        $oldid = $request->post('oldid');

        // -- ambil dari form
        $form_title = $request->post('title');
        $form_user = $request->post('user');
        $form_picture = $request->file('picture');
        $form_pictureold = $request->post('pictureold');

        // dd($form_picture);
        // -- image
        $filename = $form_pictureold;
        if($form_picture && $form_picture->getSize() > 0) {
            $filename = $form_picture->hashName();
            $form_picture->move(public_path('posts'), $filename);
        }

        // -- set ke table
        $tblPost = MPost::find($oldid);
        $tblPost->title = $form_title;
        $tblPost->id_user = $form_user;
        $tblPost->picture = $filename;
        $tblPost->save(); // doing save here..

        Session::flash('alert-success', 'Success Edit Data'); // kasih pesan success
        return redirect()->route('post.index');
    }
    public function postProsesDelete(Request $request)
    {
        $oldid = $request->query('oldid');
        $tblPost = MPost::findOrFail($oldid);
        $tblPost->delete();

        Session::flash('alert-success', 'Success Delete Data'); // kasih pesan success
        return redirect()->route('post.index');
    }
}
