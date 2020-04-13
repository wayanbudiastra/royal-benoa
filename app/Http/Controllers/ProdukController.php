<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Katagori;
use App\Model\Sub_katagori;
use App\Model\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Produk::all();
        $katagori = Katagori::all();
        //dd($data);
        return view('produk.index',['data'=>$data,'subtitle'=>'Data Produk','katagori'=>$katagori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function do_create(Request $request)
    {
        //
        try{
         $data = new Produk;
         $data->barcode = $request->barcode;
         $data->nama_produk = $request->nama_produk;
         $data->katagori_id = $request->katagori_id;
         $data->subkatagori_id = $request->subkatagori_id;
         $data->keterangan = $request->keterangan;
         if($request->hasFile('gambar')){
            $request->file('gambar')->move('images/produk',$request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
           // $siswa->save();
         } else{
            $data->gambar = 'user.png';
         }
         $data->save();
        //return $request->all();
        return redirect('/produk')->with('sukses', 'Data Berhasil di input');
        }catch (Exception $e) {
        return redirect('/produk')->with('gagal', 'Terjadi kesalahan');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Produk::find($id);
        $katagori = Katagori::all();
        $subkatagori = Sub_katagori::all();
      // dd($subkatagori);
        return view('produk.edit',['data'=>$data,'subtitle'=>'Data Produk','subkatagori'=>$subkatagori,'katagori'=>$katagori]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try{
        $data = Produk::find($id);
        $data->update($request->all());
        return redirect('/produk')->with('sukses', 'Data Berhasil di update');
        }
        catch (Exception $e) 
        {
        return redirect('/produk')->with('gagal', 'Terjadi kesalahan');
        }
    }

    public function ajax_katagori(Request $request)
    {
        //
         $all = new Sub_katagori;

        $subcategories = $all->where('katagori_id', $request->id)->get();

        return response()->json($subcategories);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
