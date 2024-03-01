<?php

namespace App\Steps;

use Vildanbina\LivewireWizard\Components\Step;
use Illuminate\Validation\Rule;

class FamilyMedical extends Step
{
    // Step view located at resources/views/steps/general.blade.php 
    protected string $view = 'applicant.steps.family-medical';

    /*
     * Initialize step fields
     */
    public function mount()
    {
        $this->mergeState([]);
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
        return [];
    }

    /*
     * Step Title
     */
    public function title(): string
    {
        return __('Family & Medical History');
    }
}
