<?php

namespace App\Livewire;

use App\Models\Branch;
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

final class BranchTable extends PowerGridComponent
{
    use WithExport;

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
            Button::add('add-branch-form')
                ->slot('<i class="fa-solid fa-plus text-sky-800"></i>')
                ->class('border py-2 px-3 rounded-lg flex items-center justify-center')
                ->route('add.branch.form', []),
            Button::add('delete-all-branch')
                ->slot('<i class="fa-solid fa-trash-can text-red-600"></i>')
                ->class('border py-2 px-3 rounded-lg flex items-center justify-center')
                ->dispatch('deleteAllBranches', []),
        ];
    }


    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(),
            [
                'eventX',
                'eventY',
                'deleteAllBranches',
            ]
        );
    }

    public function deleteAllBranches()
    {
        if (count($this->checkboxValues) == 0) {
            return redirect('/admin-branch')->with('failed', 'You must select at least one item!!');
        }

        Branch::whereIn('id', $this->checkboxValues)->delete();

        return redirect('/admin-branch')->with('success', 'Successfully delete all selected branches!!');
    }

    public function datasource(): Builder
    {
        return Branch::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('branch_name')
            ->add('branch_location')
            ->add('branch_head');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->sortable(),
            Column::make('Branch name', 'branch_name')
                ->sortable()
                ->searchable(),

            Column::make('Branch location', 'branch_location')
                ->sortable()
                ->searchable(),

            Column::make('Branch head', 'branch_head')
                ->sortable()
                ->searchable(),

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

    public function actions(Branch $row): array
    {
        return [
            Button::add('delete')
                ->slot('<i class="fa-solid fa-trash-can text-red-600"></i>')
                ->class('pg-btn-white')
                ->route('delete.branch', ['id' => $row->id]),
            Button::add('update')
                ->slot('<i class="fa-solid fa-pen-to-square text-amber-600"></i>')
                ->class('pg-btn-white')
                ->route('update.branch.form', ['id' => $row->id]),
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
