<?php

namespace Modules\Tentang\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Tentang\Entities\Tentang;
use Modules\Tentang\Entities\Dokter;
use Illuminate\Support\Facades\Validator;
use Response;

class TentangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request, $id)
    {
        $data    = array('id_tentang' => $id);
        $sejarah = Tentang::where($data)->first();

        return Response::json($sejarah);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tentang' => 'required',
            'isi_tentang' => 'required',
        ],
        [
            'tentang.required' => 'Silahkan lengkapi judul',
            'isi_tentang.required' => 'Silahkan isi keterangan',
            'image.required' => 'Gambar Terlalu Besar Max 2 Mb.',

        ]);

        if ($validator->passes()) {
            $tentangId = $request->id_tentang;
            $tanggal   = date('Y-m-d');

            $details = [
                'tentang' => $request->tentang,
                'keterangan' => $request->isi_tentang,
                'id_tentang_kat' => $request->id_tentang_kat,
                'tgl_add' => $tanggal
            ];

            if ($files = $request->file('image')) {

                \File::delete('images/tentang/' . $request->hidden_image);

                $destinationPath = 'images/tentang/';
                $profileImage    = date('YmdHis') . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $details['image'] = "$profileImage";
            }

            $tentang = Tentang::updateOrCreate(['id_tentang' => $tentangId], $details);
            return response()->json(['success'=>'Selamat Data Berhasil disimpan']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);


    }

    public function sejarah(Request $request)
    {
        $data = Tentang::with('tentangKat')->where('id_tentang_kat', 1)->get();

        return view('tentang::sejarah', ['data' => $data]);
    }

    public function profil(Request $request)
    {
        $data = Tentang::with('tentangKat')->where('id_tentang_kat', 2)->get();
        return view('tentang::profil', ['data' => $data]);
    }

    public function visimisi(Request $request)
    {
        $data = Tentang::with('tentangKat')->where('id_tentang_kat', 3)->get();
        return view('tentang::visimisi', ['data' => $data]);
    }

    public function searchDokter(Request $request)
    {
        if($request->keyword != '')
        {
            $term = strtolower($request->keyword);
            $data = Dokter::select("*")->where('status', true)
            ->where(function($query) use ($term){
                $query->whereRaw('lower(nama_dokter) like (?)',["%{$term}%"])
                      ->orWhereRaw('lower(kategori_dokter) like (?)',["%{$term}%"])
                      ->orWhereRaw('lower(kecamatan) like (?)',["%{$term}%"])
                      ->orWhereRaw('lower(alamat) like (?)',["%{$term}%"]);
            })->get();
        }else{
            $data = Dokter::where('status', true)->get();
        }

        return response()->json([
            'data' => $data
         ]);
    }

    public function dokter()
    {
        return view('tentang::dokter');
    }

    public function saveDokter(Request $request)
    {
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $dokterid   = $request->id_dokter;

        $data = [
            'nama_dokter' => $request->nama_dokter,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'kategori_dokter' => $request->kat_dokter,
            'status' => true,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'kelurahan' => $request->keluarahan,
            'kecamatan' => $request->kecamatan,
            'kabupaten' => $request->kabupaten
        ];

        if ($files = $request->file('image')) {

            \File::delete('images/tentang/' . $request->hidden_image);

            $destinationPath = 'images/tentang/';
            $profileImage    = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }

        $dokter = Dokter::updateOrCreate(['id_dokter' => $dokterid], $data);
        return Response::json($dokter);
    }

    public function updateDokter(Request $request, $id)
    {
        $data    = array('id_dokter' => $id);
        $dokter = Dokter::where($data)->first();

        return Response::json($dokter);
    }

    public function deleteDokter($id)
	{
		$data = Dokter::where('id_dokter', $id)->first(['image']);
		\File::delete('images/blog/' . $data->image);
		$dokter = Dokter::where('id_dokter', $id)->delete();

		return Response::json($dokter);
	}

    public function galeri(Request $request)
    {
        $data = Tentang::with('tentangKat')->where('id_tentang_kat',4)->get();
        return view('tentang::galeri', ['data' => $data]);
    }

    public function deleteEvent($id)
	{
		$data = Tentang::where('id_tentang', $id)->first(['image']);
		\File::delete('images/tentang/' . $data->image);
		$tentang = Tentang::where('id_tentang', $id)->delete();

		return Response::json($tentang);
	}

    public function kepuasanMasyarakat(Request $request)
    {
        $data = Tentang::with('tentangKat')->where('id_tentang_kat', 6)->get();
        return view('tentang::kepuasanM', ['data' => $data]);
    }

    public function denah(Request $request)
    {
        $data = Tentang::with('tentangKat')->where('id_tentang_kat', 4)->get();
        return view('tentang::kepuasanM', ['data' => $data]);
    }




}
