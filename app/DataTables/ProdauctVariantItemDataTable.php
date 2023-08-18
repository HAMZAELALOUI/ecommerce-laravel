<?php

namespace App\DataTables;

use App\Models\ProdauctVariantItem;
use App\Models\ProductVariantItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProdauctVariantItemDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $editeBtn = "<a  href='" . route('admin.product-variant-item.edit', $query->id) . "' class='btn btn-primary'><i class='fas fa-edit'></i></a>";
                $deleteBtn = "<a  href='" . route('admin.product-variant-item.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='fas fa-trash-alt'></i></a>";
                return $editeBtn . $deleteBtn;
            })
            ->addColumn('variant', function ($query) {
                return $query->variant->name;
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    $button = '<label class="custom-switch mt-2">
                <input  data-id="' . $query->id . '"  type="checkbox"   checked name="custom-switch-checkbox" class="custom-switch-input sub-ca-change-status">
                <span class="custom-switch-indicator"></span>
                </label>';
                } else {
                    $button = '<label class="custom-switch mt-2">
                <input data-id="' . $query->id . '" type="checkbox"  name="custom-switch-checkbox" class="custom-switch-input sub-ca-change-status">
                <span class="custom-switch-indicator"></span>
                </label>';
                }
                return $button;
            })
            ->addColumn('is_default', function ($query) {
                $yes = "<i class='badge badge-success'>Default</i>";
                $no = "<i class='badge badge-danger'>Not Default</i>";
                return $query->is_default == 1 ? $yes : $no;
            })
            ->rawColumns(['action', 'status', 'is_default', 'variant'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariantItem $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('prodauctvariantitem-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('name'),
            Column::make('variant'),
            Column::make('price'),
            Column::make('is_default'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProdauctVariantItem_' . date('YmdHis');
    }
}
