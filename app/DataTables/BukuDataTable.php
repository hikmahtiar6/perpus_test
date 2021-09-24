<?php

namespace App\DataTables;

use App\Model\BukuModel;
use App\Model\PenciptaModel;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BukuDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        // return datatable with customize
        return datatables()->of(BukuModel::query())
        ->addIndexColumn()
        ->editColumn('buku_judul', function(BukuModel $pm) {
            $role = Auth::User()->level;        
            if($role=="admin") 
            {
                return '<a href="'.route("buku.edit",encrypt($pm->buku_id)).'">'.$pm->buku_judul.'</a>';
            }
            else 
            {
                return $pm->buku_judul;
            }
        })->editColumn('pencipta_id', function(BukuModel $pm) {
            return PenciptaModel::find($pm->pencipta_id)->pencipta_nama;
        })->editColumn('buku_id', 'buku.dtdelete')
        ->rawColumns([ 'buku_judul','buku_id']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\Buku $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(BukuModel $model)
    {
        return $model->getDataAll();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {

        $builders = $this->builder()
                ->setTableId('buku-table')
                ->columns($this->getColumns())
                ->minifiedAjax()
                ->dom('Bfrtip')
                ->orderBy(1)
                ->buttons(
                    Button::make('print')
                );;

        $role = Auth::User()->level;        
        if($role=="admin") {
            
            $builders->buttons(
                Button::make('create'),
                Button::make('reload'),
            );
        }
        return $builders;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        $colums =  [
            Column::make('DT_RowIndex')->title('No.')->searchable(false),
            Column::make('buku_kode')->title('Kode'),
            Column::make('buku_judul')->title('Judul'),
            Column::make('pencipta_id')->title('Pencipta'),
            Column::make('buku_tahun_terbit')->title('Tahun Terbit'),
            Column::make('buku_stok')->title('Qty'),
        ];

        $role = Auth::User()->level;
        if($role=="admin") {
            $add1 = Column::make('buku_id')->title('Action');
            array_push($colums, $add1);
        }
        return $colums;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Buku_' . date('YmdHis');
    }
}
