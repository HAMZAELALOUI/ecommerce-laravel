<?php

namespace App\DataTables;

use App\Models\Product;
use App\Models\SellerPendingProduct;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SellerPendingProductDataTable extends DataTable
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
                $editeBtn = "<a  href='" . route('admin.product.edit', $query->id) . "' class='btn btn-primary'><i class='fas fa-edit'></i></a>";
                $deleteBtn = "<a  href='" . route('admin.product.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='fas fa-trash-alt'></i></a>";
                $moreBtn = '<div class="dropdown ml-1 dropleft d-inline">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cogs"></i>
                </button>
                <div class="dropdown-menu">
                  <a href="' . route("admin.product-image-gallery.index", ['product' => $query->id]) . '" class="dropdown-item has-icon" ><i class="far fa-heart"></i> Image Gallery</a>

                  <a class="dropdown-item has-icon" href="' . route('admin.product-variant.index', ['product' => $query->id]) . '"><i class="far fa-file"></i> Variants</a>
                </div>
              </div>';
                return $editeBtn . $deleteBtn . $moreBtn;
            })
            ->addColumn('image', function ($query) {
                return "<img width='50px' src='" . asset($query->thumb_image) . "'></img>";
            })
            ->addColumn('type', function ($query) {
                switch ($query->product_type) {
                    case 'new_arrival':
                        return "<i class='badge badge-danger'>New Arrival</i>";
                        break;
                    case 'featured_product':
                        return "<i class='badge badge-success'>Featured Product</i>";
                        break;
                    case 'best_product':
                        return "<i class='badge badge-warning'> Best Product</i>";
                        break;
                    case 'top_product':
                        return "<i class='badge badge-info'>Top Product</i>";
                        break;

                    default:
                        return "<i class='badge badge-dark'>None</i>";
                        break;
                }
            })
            ->addColumn('status',  function ($query) {
                if ($query->status == 1) {
                    $button = '<label class="custom-switch mt-2">
            <input  data-id="' . $query->id . '"  type="checkbox"   checked name="custom-switch-checkbox" class="custom-switch-input change-status">
            <span class="custom-switch-indicator"></span>
            </label>';
                } else {
                    $button = '<label class="custom-switch mt-2">
            <input data-id="' . $query->id . '" type="checkbox"  name="custom-switch-checkbox" class="custom-switch-input change-status">
            <span class="custom-switch-indicator"></span>
            </label>';
                }
                return $button;
            })
            ->addColumn('vendor',  function ($query) {
                return $query->vendor->shop_name;
            })
            ->addColumn('approve',  function ($query) {
                return ' <select name="" id="" class="form-control is_approve" data-id="' . $query->id . '">
                <option  value="0">Pending</option>
                <option  value="1">Approved</option>
            </select>';
            })
            ->rawColumns(['action', 'status', 'image', 'type', 'approve'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->where('is_approved', '==', 0)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
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
            Column::make('image'),
            Column::make('name'),
            Column::make('vendor'),
            Column::make('price'),
            Column::make('type'),
            Column::make('approve')->width(200),
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
        return 'Product_' . date('YmdHis');
    }
}
