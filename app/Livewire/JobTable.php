<?php

namespace App\Livewire;

use App\Models\Job;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use Illuminate\support\Str;

final class JobTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function header(): array
    {
        return [
            Button::add('add-job-form')
                ->slot('<i class="fa-solid fa-plus text-sky-800"></i>')
                ->class('border py-2 px-3 rounded-lg flex items-center justify-center')
                ->route('add.job.form', []),
        ];
    }


    public function datasource(): Builder
    {
        return Job::query()->with('branch', 'department');
    }

    public function relationSearch(): array
    {
        return [
            "branch" => ['branch_name'],
            "department" => ['department_name']
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('position_name')
            ->add('position_status')
            ->add('employment_type')
            // ->add('post_date_formatted', fn (Job $model) => Carbon::parse($model->post_date)->format('d/m/Y'))
            ->add('end_date_formatted', fn (Job $model) => Carbon::parse($model->end_date)->format('d/m/Y'))
            ->add('branch_name', fn (Job $model) => $model->branch->branch_name)
            ->add('department_name', fn (Job $model) => $model->department->department_name);
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Position name', 'position_name')
                ->sortable()
                ->searchable(),

            Column::make('Position status', 'position_status')
                ->sortable()
                ->searchable(),

            Column::make('Employment type', 'employment_type')
                ->sortable()
                ->searchable(),

            // Column::make('Post date', 'post_date_formatted', 'post_date')
            //     ->sortable(),

            Column::make('End date', 'end_date_formatted', 'end_date')
                ->sortable(),

            Column::make('Branch', 'branch_name'),
            Column::make('Department', 'department_name'),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('post_date'),
            Filter::datepicker('end_date'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(Job $row): array
    {
        return [
            Button::add('show')
                ->slot('<i class="fa-solid fa-eye text-sky-800"></i>')
                ->class('pg-btn-white')
                ->route('job.detail.admin', ['id' => $row->id]),
            Button::add('delete')
                ->slot('<i class="fa-solid fa-trash-can text-red-600"></i>')
                ->class('pg-btn-white')
                ->route('delete.job', ['id' => $row->id]),
            Button::add('update')
                ->slot('<i class="fa-solid fa-pen-to-square text-amber-600"></i>')
                ->class('pg-btn-white')
                ->route('update.job.form', ['id' => $row->id]),
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
