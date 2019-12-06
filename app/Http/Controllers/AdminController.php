<?php

namespace App\Http\Controllers;

use App\Akunbank;
use App\Alamat;
use App\Biodata;
use App\Produk;
use App\User;
use App\Kategori;
use App\Subkategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect,Response;

use Yajra\Datatables\Datatables as Datatables;

class AdminController extends Controller
{
    //
    public function index(){
        if(Auth::check() && Auth::user()->tipe == '1'){



            return view('admin.admin');

        }
        return view('home');
    }

    public function datauser()
    {
        if(Auth::check() && Auth::user()->tipe == '1'){

            $us = User::whereNotIn('tipe', [1])->get();
            return view('admin.datauser', compact('us'));
            //return $us;
        }
        return view('home');
    }

    public function kategori()
    {
        if(Auth::check() && Auth::user()->tipe == '1'){

        $al = Kategori::all();
       //dd($kat);
        return view('admin.kategori',compact('al'));
        }
        return view('home');
    }

    public function katget(){
        if(request()->ajax()) {
            return Datatables()->of(Kategori::select('*'))
                ->addColumn('action', function($row){


                    $btn = '<a href="javascript:void(0)" class="tooltip-button demo-icon edit-user"  id="'.$row->id.'" style="font-size: 19px; line-height: 30px; width: 30px; height: 30px; margin: 2px"><i class="glyph-icon icon-pencil"></i></a>';


                    $btn = $btn.'<a href="javascript:void(0)" class="tooltip-button demo-icon hapus-user" id="'.$row->id.'" style="color:red; font-size: 19px; line-height: 30px; width: 30px; height: 30px; margin: 2px"><i class="glyph-icon icon-trash"></i></a>';



                    return $btn;

                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
    public function subkategori()
    {
        if(request()->ajax()) {
            return Datatables()->of(Subkategori::select('*'))
                ->addColumn('action', function($row){


                    $btn = '<a href="javascript:void(0)" class="tooltip-button demo-icon edit-user1"  id="'.$row->id.'" style="font-size: 19px; line-height: 30px; width: 30px; height: 30px; margin: 2px"><i class="glyph-icon icon-pencil"></i></a>';


                    $btn = $btn.'<a href="javascript:void(0)" class="tooltip-button demo-icon hapus-user1" id="'.$row->id.'" style="color:red; font-size: 19px; line-height: 30px; width: 30px; height: 30px; margin: 2px"><i class="glyph-icon icon-trash"></i></a>';



                    return $btn;

                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }



    }
    public function cari($id)

    {

        $product = Kategori::find($id);

        return response()->json($product);

    }

    public function carisub($id)

    {

        $product1 = Subkategori::find($id);

        return response()->json($product1);

    }
    public function kategoripost(Request $request)
    {
        $request->validate([
           'nama' => 'required',
        ]);
        $data = $request->nama;
        $check = Kategori::create(['nama' => $data]);
        $arr = array('msg' => 'Terjadi Kesalahan, Coba Lagi', 'status' => false);
        if($check){
            $arr = array('msg' => 'Berhasil Disimpan', 'status' => true);
        }
        return Response()->json($arr);
        //dd($request->nama);
    }

    public function kategoriedit(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
        ]);
        $id = $request->id;
        $check = Kategori::whereId($id)->update($data);
        $arr = array('msg' => 'Terjadi Kesalahan, Coba Lagi', 'status' => false);
        if($check){
            $arr = array('msg' => 'Berhasil Diubah', 'status' => true);
        }
        return Response()->json($arr);
        //dd($request->nama);
    }

    public function kategorihapus(Request $request)
    {
        $id = $request->id;
        $check = Kategori::whereId($id)->delete();
        $arr = array('msg' => 'Terjadi Kesalahan, Coba Lagi', 'status' => false);
        if($check){
            $arr = array('msg' => 'Berhasil Dihapus', 'status' => true);
        }
        return Response()->json($arr);
        //dd($request->nama);
    }

    public function subpost(Request $request)
    {
        $request->validate([
            'idkategori' => 'required',
            'namasub' => 'required',
        ]);
        $data = $request->namasub;
        $data1 = $request->idkategori;
        $check = Subkategori::create(['kategori_id' => $data1,'nama' => $data]);
        $arr = array('msg' => 'Terjadi Kesalahan, Coba Lagi', 'status' => false);
        if($check){
            $arr = array('msg' => 'Berhasil Disimpan', 'status' => true);
        }
        return Response()->json($arr);
        //dd($request->nama);
    }

    public function subedit(Request $request)
    {
        $data = $request->validate([
            'namasub' => 'required',
        ]);
        $id = $request->id;
        $check = Subkategori::whereId($id)->update($data);
        $arr = array('msg' => 'Terjadi Kesalahan, Coba Lagi', 'status' => false);
        if($check){
            $arr = array('msg' => 'Berhasil Diubah', 'status' => true);
        }
        return Response()->json($arr);
        //dd($request->nama);
    }

    public function subhapus(Request $request)
    {
        $id = $request->id;
        $check = Subkategori::whereId($id)->delete();
        $arr = array('msg' => 'Terjadi Kesalahan, Coba Lagi', 'status' => false);
        if($check){
            $arr = array('msg' => 'Berhasil Dihapus', 'status' => true);
        }
        return Response()->json($arr);
        //dd($request->nama);
    }

    public function produk(){
        if(Auth::check() && Auth::user()->tipe == '1'){

            $al = Kategori::all();
            //dd($kat);
            return view('admin.produk',compact('al'));
        }
        return view('home');
    }

    public function produkdetail(){
        if(request()->ajax()) {
            return Datatables()->of(produk::select('*'))
                ->addColumn('action', function($row){


                    $btn = '<a href="javascript:void(0)" class="tooltip-button demo-icon edit-user1"  id="'.$row->id.'" style="font-size: 19px; line-height: 30px; width: 30px; height: 30px; margin: 2px"><i class="glyph-icon icon-pencil"></i></a>';


                    $btn = $btn.'<a href="javascript:void(0)" class="tooltip-button demo-icon hapus-user1" id="'.$row->id.'" style="color:red; font-size: 19px; line-height: 30px; width: 30px; height: 30px; margin: 2px"><i class="glyph-icon icon-trash"></i></a>';



                    return $btn;

                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
    }
}
