<?php

namespace Modules\Pelayanan\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Tentang\Entities\Dokter;
use Modules\Pelayanan\Entities\Kategoripelayanan;
use Modules\Pelayanan\Entities\Pelayanan;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;
use Response;

class PelayananController extends Controller
{

    public function __construct()
	{
		$this->middleware('auth');
	}

    public function rawatJalan(Request $request)
    {
        $katpelayanan = Kategoripelayanan::all();
        $dokter = Dokter::where('status', true)->get();
        $data = Pelayanan::where('id_kategoripel', 1)->get();
        return view('pelayanan::rawatJalan', ['data'=>$data, 'katpelayanan'=>$katpelayanan,'dokter'=>$dokter]);
    }

    public function igd(Request $request)
    {
        $katpelayanan = Kategoripelayanan::all();
        $dokter = Dokter::where('status', true)->get();
        $data = Pelayanan::where('id_kategoripel', 2)->get();
        return view('pelayanan::igd', ['data'=>$data, 'katpelayanan'=>$katpelayanan,'dokter'=>$dokter]);
    }

    public function rawatinap(Request $request)
    {
        $katpelayanan = Kategoripelayanan::all();
        $dokter = Dokter::where('status', true)->get();
        $data = Pelayanan::where('id_kategoripel', 3)->get();
        return view('pelayanan::igd', ['data'=>$data, 'katpelayanan'=>$katpelayanan,'dokter'=>$dokter]);
    }

    public function penunjang(Request $request)
    {
        $katpelayanan = Kategoripelayanan::all();
        $dokter = Dokter::where('status', true)->get();
        $data = Pelayanan::where('id_kategoripel', 4)->get();
        return view('pelayanan::igd', ['data'=>$data, 'katpelayanan'=>$katpelayanan,'dokter'=>$dokter]);
    }

    public function addpelayanan(Request $request)
    {
        $katpelayanan = Kategoripelayanan::all();
        $dokter = Dokter::where('status', true)->get();
        return view('pelayanan::pelayananadd', ['dokter'=>$dokter, 'katpelayanan'=>$katpelayanan]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_pelayanan' => 'required',

        ],
        [
            'nama_pelayanan.required' => 'Silahkan lengkapi Nama Pelayanan',
            'image.required' => 'Gambar Terlalu Besar Max 2 Mb.',

        ]);

        if ($validator->passes()) {

            $pelayananid = $request->id_pelayanan;

            $data = [
                'nama_pelayanan' => $request->nama_pelayanan,
                'id_kategoripel' => $request->id_kategoripel,
                'id_dokter' => $request->id_dokter,
                'keterangan' => $request->fasilitas
            ];

            if($file = $request->file('image')){
                \File::delete('images/pelayanan' . $request->hidden_image);
                $lokasi = 'images/pelayanan';
                $profil = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move($lokasi, $profil);
                $data['image'] =  "$profil";
            }

            $pelayanan = Pelayanan::updateOrCreate(['id_pelayanan'=>$pelayananid], $data);
            return response()->json(['success'=>'Selamat Data Berhasil disimpan']);

        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function update(Request $request, $id)
    {
        $data  = array('id_pelayanan' => $id);
        $pelayanan = Pelayanan::where($data)->first();

        return Response::json($pelayanan);
    }

    public function destroy($id)
    {
        $data = Pelayanan::where('id_pelayanan', $id)->first(['image']);
		\File::delete('images/pelayanan/' . $data->image);
		$Pelayanan = Pelayanan::where('id_pelayanan', $id)->delete();

		return Response::json($Pelayanan);
    }
}
