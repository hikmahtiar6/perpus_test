<?php
/**
 * Pencipta Controller
 */
namespace App\Http\Controllers;

use App\DataTables\PenciptaDataTable;
use App\Model\PenciptaModel;
use Illuminate\Http\Request;
class PenciptaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PenciptaDataTable $datatable)
    {
        return $datatable->render('pencipta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pencipta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1
        $penciptaM = new PenciptaModel();

        $arr1 = [
            "pencipta_nama" => $request->pname
        ];
        
        $save1 = $penciptaM->saveData($arr1);

        return redirect()->route('pencipta.index')
            ->with('success','Pencipta berhasil ditambah');   
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
        $data      = $penciptaM->find($id);
        return view('pencipta.edit', compact('data'));
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

        $penciptaM = new PenciptaModel();
        $d         = $penciptaM->find($id);
        $arr1 = [
            "pencipta_nama" => $request->pname
        ];

        
        if(!empty($d)) {
            $del = $d->update($arr1);
        }

        return redirect()->route('pencipta.index')
            ->with('success','Pencipta berhasil diupdate');
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

        $penciptaM = new PenciptaModel();
        $d         = $penciptaM->find($id);
        if(!empty($d)) {
            $del = $d->delete();
        }
        
        return back()
            ->with('success','Pencipta berhasil dihapus');
    }
}
