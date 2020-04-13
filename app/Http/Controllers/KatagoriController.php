<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Katagori;
use App\Model\Sub_katagori;

class KatagoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Katagori::all();
        return view('katagori.index',['data'=>$data,'subtitle'=>'Data Katagori']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function do_create(Request $request)
    {
        //
         $data = Katagori::create($request->all());
        //  return $request->all();
        return redirect('/katagori')->with('sukses', 'Data Berhasil di input');
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
        $data = Katagori::find($id);
        
        return view('katagori.edit',['data'=>$data,'subtitle'=>"Edit Data"]);
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
        $data = Katagori::find($id);
        $data->update($request->all());

        return redirect('/katagori')->with('sukses', 'Data Berhasil di update');
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
