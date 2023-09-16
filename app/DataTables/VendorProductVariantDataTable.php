<?php

namespace App\DataTables;

use App\Models\ProductVariant;
use App\Models\VendorProductVariant;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorProductVariantDataTable extends DataTable
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
                $variantItems = "<a  href='" . route('vendor.product-variant-item.index', ['variantID' => $query->id, 'productID' => request()->product]) . "' class='btn btn-info mr-2'><i class='fas fa-sitemap'></i> Variant Items</a>";
                $editeBtn = "<a  href='" . route('vendor.product-variant.edit', $query->id) . "' class='btn btn-primary'><i class='fas fa-edit'></i></a>";
                $deleteBtn = "<a  href='" . route('vendor.product-variant.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='fas fa-trash-alt'></i></a>";
                return $variantItems . $editeBtn . $deleteBtn;
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 1) {
                    $button = '<div class="form-check form-switch" style="width:100px" >
                           <input  checked class="form-check-input change-status " type="checkbox" id="flexSwitchCheckChecked"  data-id="' . $query->id . '"  >
                            </div>';
                } else {
                    $button = '<div class="form-check form-switch" style="width:100px">
                               <input class="form-check-input change-status" type="checkbox" id="flexSwitchCheckChecked"   data-id="' . $query->id . '" >
                               </div>';
                }
                return $button;
            })
            ->rawColumns(['status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductVariant $model): QueryBuilder
    {
        return $model->where('product_id', request()->product)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('vendorproductvariant-table')
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
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(300)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'VendorProductVariant_' . date('YmdHis');
    }
}
