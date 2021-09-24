<?php

namespace App\DataTables;

use App\Model\PenciptaModel;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PenciptaDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable(PenciptaModel $pm)
    {
        // return datatable with customize
        return datatables()->of(PenciptaModel::query())
        ->addIndexColumn()
        ->editColumn('pencipta_nama', function(PenciptaModel $pm) {

            $role = Auth::User()->level;        
            if($role=="admin") {
                return '<a href="'.route("pencipta.edit",['penciptum'=>encrypt($pm->pencipta_id)]).'">'.$pm->pencipta_nama.'</a>';
            }else {
                return $pm->pencipta_nama;
            }

            
        })->editColumn('pencipta_id', 'pencipta.dtdelete')
        ->rawColumns([ 'pencipta_nama','pencipta_id']);;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\App\Penciptum $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(PenciptaModel $model)
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
                ->setTableId('pencipta-table')
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
        $colums = [
            Column::make('DT_RowIndex')->title('No.')->searchable(false),
            Column::make('pencipta_nama')->title('Nama'),
        ];

        $role = Auth::User()->level;
        if($role=="admin") {
            $add1 = Column::make('pencipta_id')->title('Action');
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
        return 'Pencipta_' . date('YmdHis');
    }
}
