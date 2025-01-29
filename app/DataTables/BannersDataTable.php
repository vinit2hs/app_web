<?php

namespace App\DataTables;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BannersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('image', function ($query) {
                return '<a class="d-block overlay" data-fslightbox="lightbox-basic" href="'.asset("storage/{$query->image}").'">
                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-100px"
                                style="background-image:url('.asset("storage/{$query->image}").')"></div>
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                <i class="bi bi-eye-fill text-white fs-3x"></i>
                            </div>
                        </a>';
            })
            ->editColumn('active', function ($query) {
                $class = $query->active ? 'badge-light-success' : 'badge-light-danger';
                $value = $query->active ? 'Ativo' : 'Inativo';
                return '<div class="badge fs-7 ' . $class . '">' . $value . '</div>';
            })
            ->editColumn('acoes', function ($query) {
                return view('components.banners.dataTableActions', ['id' => $query->id]);
            })
            ->rawColumns(['image', 'active'])
            ->setRowClass('text-gray-700 bg-hover-light-primary')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Banner $model): QueryBuilder
    {
        $query = $model->newQuery();
//        $filter_nome = $this->request->input('filter_nome');
//        $filter_sankhya_code = $this->request->input('filter_sankhya_code');
//        $filter_intelbras_code = $this->request->input('filter_intelbras_code');
//        $filter_brand = $this->request->input('filter_brand');
//        $filter_category = $this->request->input('filter_category');
//        $filter_subcategory = $this->request->input('filter_subcategory');
//
//        if ($filter_nome) {
//            $query->where('name', 'like', '%' . $filter_nome . '%');
//        }
//        if ($filter_sankhya_code) {
//            $query->where('sankhya_code', $filter_sankhya_code);
//        }
//        if ($filter_intelbras_code) {
//            $query->where('intelbras_code', $filter_intelbras_code);
//        }
//        if ($filter_brand) {
//            $query->whereHas('brand', function ($query) use ($filter_brand) {
//                $query->where('id', $filter_brand);
//            });
//        }
//        if ($filter_category) {
//            $query->whereHas('category', function ($query) use ($filter_category) {
//                $query->where('id', $filter_category);
//            });
//        }
//        if ($filter_subcategory) {
//            $query->whereHas('subCategory', function ($query) use ($filter_subcategory) {
//                $query->where('id', $filter_subcategory);
//            });
//        }



        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('banners-table')
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
                'filter_sankhya_code' => "$('#filter_sankhya_code').val()",
                'filter_intelbras_code' => "$('#filter_intelbras_code').val()",
                'filter_brand' => "$('#filter_brand').val()",
                'filter_category' => "$('#filter_category').val()",
                'filter_subcategory' => "$('#filter_subcategory').val()"
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('image')->title('Imagem')->addClass('w-175px text-center align-middle'),
            Column::make('title')->title('Nome')->addClass('text-center align-middle'),
            Column::make('active')->title('Status')->addClass('text-center align-middle'),
            Column::make('link')->title('Link')->addClass('text-center align-middle'),
            Column::make('priority')->title('Posição')->addClass('text-center align-middle'),
            Column::make('acoes')->title('Ações')->addClass('text-center align-middle'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Banners_' . date('YmdHis');
    }
}
