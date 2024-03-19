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
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Applicant::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('fullname')
            ->add('email')
            ->add('birth_date_formatted', fn (Applicant $model) => Carbon::parse($model->birth_date)->format('d/m/Y'))
            ->add('birth_place')
            ->add('address')
            ->add('applicant_phones')
            ->add('religion')
            ->add('gender')
            ->add('marital_status')
            ->add('ktp_number')
            ->add('hobby')
            ->add('blood_type')
            ->add('height')
            ->add('weight')
            ->add('application_status')
            ->add('application_date_formatted', fn (Applicant $model) => Carbon::parse($model->application_date)->format('d/m/Y'))
            ->add('info_of_job')
            ->add('social_medias')
            ->add('applicant_photo')
            ->add('term_and_co')
            ->add('job_id');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Fullname', 'fullname')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Birth date', 'birth_date_formatted', 'birth_date')
                ->sortable(),

            Column::make('Birth place', 'birth_place')
                ->sortable()
                ->searchable(),

            Column::make('Address', 'address')
                ->sortable()
                ->searchable(),

            Column::make('Applicant phones', 'applicant_phones')
                ->sortable()
                ->searchable(),

            Column::make('Religion', 'religion')
                ->sortable()
                ->searchable(),

            Column::make('Gender', 'gender')
                ->sortable()
                ->searchable(),

            Column::make('Marital status', 'marital_status')
                ->sortable()
                ->searchable(),

            Column::make('Ktp number', 'ktp_number')
                ->sortable()
                ->searchable(),

            Column::make('Hobby', 'hobby')
                ->sortable()
                ->searchable(),

            Column::make('Blood type', 'blood_type')
                ->sortable()
                ->searchable(),

            Column::make('Height', 'height')
                ->sortable()
                ->searchable(),

            Column::make('Weight', 'weight')
                ->sortable()
                ->searchable(),

            Column::make('Application status', 'application_status')
                ->sortable()
                ->searchable(),

            Column::make('Application date', 'application_date_formatted', 'application_date')
                ->sortable(),

            Column::make('Info of job', 'info_of_job')
                ->sortable()
                ->searchable(),

            Column::make('Social medias', 'social_medias')
                ->sortable()
                ->searchable(),

            Column::make('Applicant photo', 'applicant_photo')
                ->sortable()
                ->searchable(),

            Column::make('Term and co', 'term_and_co')
                ->sortable()
                ->searchable(),

            Column::make('Job id', 'job_id'),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('birth_date'),
            Filter::datepicker('application_date'),
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
            Button::add('edit')
                ->slot('Edit: ' . $row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
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
