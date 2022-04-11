<?php

namespace Modules\Tentang\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Tentang\Entities\Tentang;
use Response;

class TentangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sejarah(Request $request)
    {
        $qs   = $request->segment(1) . ' / ' . $request->segment(2);
        $data = Tentang::with('tentangKat')->where('id_tentang_kat', 1)->get();

        return view('tentang::sejarah', ['qs' => $qs, 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data    = array('id_tentang' => $id);
        $sejarah = Tentang::where($data)->first();

        return Response::json($sejarah);
    }

    public function store(Request $request)
    {
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $tentangId = $request->id_tentang;
        $tanggal   = date('Y-m-d');

        $details = ['tentang' => $request->tentang, 'keterangan' => $request->isi_tentang, 'id_tentang_kat' => $request->id_tentang_kat, 'tgl_add' => $tanggal];

        if ($files = $request->file('image')) {

            \File::delete('public/images/tentang/' . $request->hidden_image);

            $destinationPath = 'public/images/tentang/';
            $profileImage    = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $details['image'] = "$profileImage";
        }

        $tentang = Tentang::updateOrCreate(['id_tentang' => $tentangId], $details);
        return Response::json($tentang);
    }

    public function profil(Request $request)
    {
        $qs   = $request->segment(1) . ' / ' . $request->segment(2);
        $data = Tentang::with('tentangKat')->where('id_tentang_kat', 2)->get();

        return view('tentang::profil', ['qs' => $qs, 'data' => $data]);
    }

    public function visimisi(Request $request)
    {
        $qs   = $request->segment(1) . ' / ' . $request->segment(2);
        $data = Tentang::with('tentangKat')->where('id_tentang_kat', 2)->get();

        return view('tentang::visimisi', ['qs' => $qs, 'data' => $data]);
    }

}
