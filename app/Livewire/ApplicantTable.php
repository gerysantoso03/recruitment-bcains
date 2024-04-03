<?php

namespace App\Livewire;

use App\Models\Applicant;
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

final class ApplicantTable extends PowerGridComponent
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
        return [];
    }

    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(),
            [
                'eventX',
                'eventY',
            ]
        );
    }

    public function bulkUpdateApplicantStatus()
    {
        if (count($this->checkboxValues) == 0) {
            return redirect('/admin-applicant')->with('failed', 'You must select at least one item!!');
        }

        Applicant::whereIn('id', $this->checkboxValues)->delete();

        return redirect('/admin-job')->with('success', 'Successfully delete selected job!!');
    }


    public function datasource(): Builder
    {
        return Applicant::query()->with('job');
    }

    public function relationSearch(): array
    {
        return [
            'job' => ['position_name']
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('application_status_id', fn (Applicant $model) => $model->applicationStatus->status)
            ->add('fullname')
            ->add('email')
            ->add('application_date_formatted', fn (Applicant $model) => Carbon::parse($model->application_date)->toFormattedDateString())
            ->add('age')
            ->add('applicant_phones', function (Applicant $model) {
                $phones = json_decode($model->applicant_phones, true);
                return $phones['cell_phone'];
            })
            ->add('gender')
            ->add('ktp_number')
            ->add('job_id', fn (Applicant $model) => $model->job->position_name);
    }

    public function columns(): array
    {
        return [
            Column::action('Action'),
            Column::make('Status', 'application_status_id')
                ->sortable()
                ->searchable(),
            Column::make('Fullname', 'fullname')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Application date', 'application_date_formatted', 'application_date')
                ->sortable(),

            Column::make('Age', 'age')
                ->sortable(),

            Column::make('Phone Number', 'applicant_phones')
                ->sortable()
                ->searchable(),

            Column::make('KTP', 'ktp_number')
                ->sortable()
                ->searchable(),

            Column::make('Job', 'job_id'),

        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('birth_date'),
            Filter::datepicker('application_date'),
            Filter::number('age', 'age')
                ->thousands('.')
                ->decimal(','),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(Applicant $row): array
    {
        return [
            Button::add('show')
                ->slot('<i class="fa-solid fa-eye text-sky-800"></i>')
                ->class('pg-btn-white')
                ->route('applicant.detail.admin', ['id' => $row->id]),
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
