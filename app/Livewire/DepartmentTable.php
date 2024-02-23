<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Division;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class DepartmentTable extends PowerGridComponent
{
    use WithExport;
    public bool $showFilters = true;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showToggleColumns()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function header(): array
    {
        return [
            Button::add('add-department-form')
                ->slot('<i class="fa-solid fa-plus text-sky-800"></i>')
                ->class('border py-2 px-3 rounded-lg flex items-center justify-center')
                ->route('add.department.form', []),
        ];
    }

    public function datasource(): Builder
    {
        return Department::query()->with('division');
    }

    public function relationSearch(): array
    {
        return [
            'division' => ['division_name']
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('department_name')
            ->add('department_head')
            ->add('division_name', function (Department $model) {
                return $model->division->division_name;
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->sortable(),
            Column::make('Departemen', 'department_name')
                ->sortable()
                ->searchable(),

            Column::make('Kepala Departemen', 'department_head')
                ->sortable()
                ->searchable(),

            Column::make('Divisi', 'division_name'),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(Department $row): array
    {
        return [
            Button::add('show')
                ->slot('<i class="fa-solid fa-eye text-sky-800"></i>')
                ->class('pg-btn-white'),
            Button::add('delete')
                ->slot('<i class="fa-solid fa-trash-can text-red-600"></i>')
                ->class('pg-btn-white')
                ->route('delete.department', ['id' => $row->id]),
            Button::add('update')
                ->slot('<i class="fa-solid fa-pen-to-square text-amber-600"></i>')
                ->class('pg-btn-white')
                ->route('update.department.form', ['id' => $row->id]),
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