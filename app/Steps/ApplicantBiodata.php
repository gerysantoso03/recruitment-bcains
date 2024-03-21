<?php

namespace App\Steps;

use Vildanbina\LivewireWizard\Components\Step;
use Illuminate\Validation\Rule;

class ApplicantBiodata extends Step
{
    // Step view located at resources/views/steps/general.blade.php 
    protected string $view = 'applicant.steps.applicant-biodata';
    public $familyStructures = [];

    /*
     * Initialize step fields
     */
    public function mount()
    {
        $this->mergeState([
            'fullname' => $this->model->fullname,

        ]);
    }

    /*
    * Step icon 
    */
    public function icon(): string
    {
        return 'check';
    }

    /*
     * Step Validation
     */
    public function validate()
    {
        return [
            [
                // 'state.fullname' => ['required'],
                // 'state.email' => ['required', 'email', Rule::unique('applicants', 'email')->ignoreModel($this->model)],
                // 'state.birth_date' => ['required'],
                // 'state.birth_place' => ['required'],
                // 'state.address' => ['required'],
                // 'state.religion' => ['required'],
                // 'state.gender' => ['required'],
                // 'state.marital_status' => ['required'],
                // 'state.ktp_number' => ['required', 'integer', Rule::unique('applicants', 'ktp_number')->ignoreModel($this->model)],
                // 'state.hobby' => ['required'],
                // 'state.blood_type' => ['required'],
                // 'state.height' => ['required', 'integer'],
                // 'state.weight' => ['required', 'integer'],
                // 'state.info_of_job' => ['required'],
                // 'state.applicant_photo' => ['required', 'image', 'dimensions:min_width=300,min_height=400', 'extensions:jpg,png,jpeg']
            ],
            // [
            //     'state.fullname'     => __('Fullname'),
            //     'state.email'    => __('Email'),
            // ],
        ];
    }

    /*
     * Step Title
     */
    public function title(): string
    {
        return __('Applicant Biodata');
    }
}
