<?php

namespace App\DataTables;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BrandsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('active', function ($query) {
                $class = $query->active ? 'badge-light-success' : 'badge-light-danger';
                $value = $query->active ? 'Sim' : 'Não';
                return '<div class="badge fs-7 ' . $class . '">' . $value . '</div>';
            })
            ->editColumn('acoes', function ($query) {
                return view('components.brands.dataTableActions', ['id' => $query->id]);
            })
            ->rawColumns(['active'])
            ->setRowClass('text-gray-700 bg-hover-light-primary');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Brand $model): QueryBuilder
    {
        $query = $model->newQuery();
        $filter_nome = $this->request->input('filter_nome');
        $filter_active = $this->request->input('filter_active');

        if ($filter_nome) {
            $query->where('name', 'like', '%' . $filter_nome . '%');
        }
        if ($filter_active || $filter_active == '0') {
            $query->where('active', $filter_active);
        }

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('brands-table')
            ->addTableClass('align-middle table-row-dashed fs-6 gy-5')
            ->setTableHeadClass('text-uppercase fw-bold text-muted fs-7')
            ->columns($this->getColumns())
            ->orderBy(0, 'desc')
            ->stateSave(false)
            ->lengthChange(false)
            ->language(['url' => asset('assets/js/datatablePtBr.json')])
            ->setTemplate('')
            ->minifiedAjax('', null, [
                'filter_nome' => "$('#filter_nome').val()",
                'filter_active' => "$('#filter_active').val()",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('Id')->addClass('w-175px text-center align-middle'),
            Column::make('name')->title('Nome')->addClass('text-center align-middle'),
            Column::make('active')->title('Ativo')->addClass('text-center align-middle'),
            Column::make('acoes')->title('Ações')->addClass('text-center align-middle'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Brands_' . date('YmdHis');
    }
}
