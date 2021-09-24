<?php

namespace App\Http\Controllers;

use App\DataTables\BukuDataTable;
use App\Model\BukuModel;
use App\Model\PenciptaModel;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BukuDataTable $datatable)
    {
        return $datatable->render('buku.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penciptaM   = new PenciptaModel();
        $getPencipta = $penciptaM->getDataAll();
        return view('buku.create',[
            'pencipta' => $getPencipta
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bukuM = new BukuModel();

        $arr1 = [
            "buku_kode" => $request->kdbuk,
            "buku_judul" => $request->judbuk,
            "pencipta_id" => $request->pencibuk,
            "buku_tahun_terbit" => $request->thnbuk,
            "buku_stok" => $request->qty,
        ];
        
        $save1 = $bukuM->saveData($arr1);

        return redirect()->route('buku.index')
            ->with('success','Buku berhasil ditambah');
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
        $id = decrypt($id);

        $penciptaM = new PenciptaModel();
        $pencipta  = $penciptaM->getDataAll();

        $bukuM     = new BukuModel();
        $data      = $bukuM->find($id);
        return view('buku.edit', [
            'pencipta' => $pencipta,
            'data'     => $data,
        ]);
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
        $id = decrypt($id);

        $bukuM = new BukuModel();
        $d = $bukuM->find($id);
        $arr1 = [
            "buku_kode" => $request->kdbuk,
            "buku_judul" => $request->judbuk,
            "pencipta_id" => $request->pencibuk,
            "buku_tahun_terbit" => $request->thnbuk,
            "buku_stok" => $request->qty,
        ];

        
        if(!empty($d)) {
            $del = $d->update($arr1);
        }

        return redirect()->route('buku.index')
            ->with('success','Buku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = decrypt($id);

        $bukuM = new BukuModel();
        $d         = $bukuM->find($id);
        if(!empty($d)) {
            $del = $d->delete();
        }
        
        return back()
            ->with('success','Pencipta berhasil dihapus');
    }
}
