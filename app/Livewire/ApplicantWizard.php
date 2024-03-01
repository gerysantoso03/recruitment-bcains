<?php

namespace App\Livewire;

use App\Models\Applicant;
use App\Steps\ApplicantBiodata;
use App\Steps\FamilyMedical;
use Livewire\WithFileUploads;
use Vildanbina\LivewireWizard\WizardComponent;

class ApplicantWizard extends WizardComponent
{
    use WithFileUploads;
    public Applicant $applicant;

    public array $steps = [
        ApplicantBiodata::class,
        FamilyMedical::class
    ];

    public function model(): Applicant
    {
        return new Applicant();
    }
}
