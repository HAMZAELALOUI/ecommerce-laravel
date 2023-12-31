<?php

namespace App\DataTables;

use App\Models\GeneralSettings;
use App\Models\ShippingRule;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ShippingRuleDataTable extends DataTable
{
    protected $currency_icon = '';
    public function __construct()
    {
        $this->currency_icon = GeneralSettings::first()->currency_icon;
    }

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $editeBtn = "<a  href='" . route('admin.shipping-rule.edit', $query->id) . "' class='btn btn-primary'><i class='fas fa-edit'></i></a>";
                $deleteBtn = "<a  href='" . route('admin.shipping-rule.destroy', $query->id) . "' class='btn btn-danger ml-2 delete-item'><i class='fas fa-trash-alt'></i></a>";
                return $editeBtn . $deleteBtn;
            })
            ->addColumn('status', function ($query) {
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
            ->addColumn('type', function ($query) {
                if ($query->type == 'min_cost') {
                    return   "<i class='badge bg-warning'>Minimum Order Amount</i>";
                } else {
                    return "<i class='badge bg-info'>Flat Costs</i>";
                }
            })
            ->addColumn('min_cost', function ($query) {
                if ($query->type == 'min_cost') {
                    return  $this->currency_icon . $query->min_cost;
                } else {
                    return $this->currency_icon . "0";
                }
            })
            ->addColumn('cost', function ($query) {
                return  $this->currency_icon . $query->cost;
            })
            ->rawColumns(['action', 'status', 'type'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ShippingRule $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('shippingrule-table')
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
            Column::make('type'),
            Column::make('min_cost'),
            Column::computed('cost'),
            Column::computed('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ShippingRule_' . date('YmdHis');
    }
}
