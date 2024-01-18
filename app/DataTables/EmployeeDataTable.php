<?php

namespace App\DataTables;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmployeeDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->addColumn('date_added', function (Employee $employee) {
                return date('d-m-Y', strtotime($employee->created_at));
            })
            ->addColumn('action', function (Employee $employee) {
                return "
                <a href='" . route('employee.edit', ['id' => $employee->id]) . "' class='btn btn-info btn-icon btn-sm' type='button' ><i class='bi bi-pencil'></i> Edit</a>
                <a class='btn btn-danger btn-icon btn-sm btn-delete' onclick='delete_employee(`" . $employee->id . "`,`" . $employee->first_name . "`)' type='button'><i class='bi bi-trash'></i> Delete</a>
                ";
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Employee $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('employee-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->dom('Bfrtip')
            ->orderBy(9)
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
            Column::computed('DT_RowIndex')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->title('No.'),
            Column::make('action')
                ->exportable(false)
                ->printable(false)
                ->searchable(false)
                ->orderable(false),
            Column::make('first_name')->title('First Name'),
            Column::make('last_name')->title('Last Name'),
            Column::make('date_of_birth')->title('Date of Birth'),
            Column::make('phone_number')->title('Phone Number'),
            Column::make('email_address')->title('Email Address'),
            Column::make('province_address')->title('Province Address'),
            Column::make('city_address')->title('City Address'),
            Column::make('street_address')->title('Street Address'),
            Column::make('zip_code')->title('Zip Code'),
            Column::make('ktp_number')->title('KTP Number'),
            Column::make('current_position')->title('Current Position'),
            Column::make('bank_account')->title('Bank Account'),
            Column::make('bank_account_number')->title('Bank Account Number'),
            Column::make('date_added')->title('Date Added'),
            Column::make('created_at')->hidden(),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Employee_' . date('YmdHis');
    }
}
