<?php

namespace Modules\Informasi\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Informasi\Entities\InformasiV;
use Modules\Informasi\Entities\InformasiT;
use Yajra\DataTables\DataTables;
use Response;

class InformasiController extends Controller
{
  public function __construct()
	{
		$this->middleware('auth');
	}

	public function index(Request $request)
	{
		return view('informasi::informasi');
	}

	public function getInformasi(Request $request)
	{
		if ($request->ajax()) 
		{
			$data = InformasiV::select('*');
			return Datatables::of($data)
			->addColumn('image', function($data)
			{
				if (empty($data->image)) {
					return '';
				}
				return '<img src="/images/blog/'.$data->image.'" width="50px" height="50px">';
			})

			->addColumn('action', 'informasi::informasi-action')
			->rawColumns(['image','action'])
			->addIndexColumn()
			->make(true);
		}

		$data_info = Informasi::where('kategori_id', 1)->get();

		return view('informasi::informasi-action',$data_info);
	}


	public function store(Request $request)
	{
		request()->validate([
			'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		]);

		$informasiId = $request->informasi_id;
		$tanggal     = date('Y-m-d');

		$details = ['judul' => $request->judul_informasi, 'isi' => $request->isi_informasi, 'kategori_id' => $request->kategori_id, 'tgl_post' => $tanggal, 'status' => true];

		if ($files = $request->file('image')) {

			\File::delete('images/blog/' . $request->hidden_image);
			//image path
			$destinationPath = 'images/blog/';
			$profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
			$files->move($destinationPath, $profileImage);
			$details['image'] = "$profileImage";
		}

		$informasi   =  InformasiT::updateOrCreate(['informasi_id' => $informasiId], $details);
		return Response::json($informasi);
	}

	public function editInformasi($id)
	{   
		$where = array('informasi_id' => $id);
		$informasi  = InformasiT::where($where)->first();
		
		return Response::json($informasi);
	}

	public function destroy($id)
	{
		$data = InformasiT::where('informasi_id', $id)->first(['image']);
		\File::delete('images/blog/' . $data->image);
		$informasi = InformasiT::where('informasi_id', $id)->delete();

		return Response::json($informasi);
	}
}
