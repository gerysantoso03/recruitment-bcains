<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class ApplicantFormHeader extends Component
{
    // Step for each header
    public $currStep = 1;

    #[On('stepChanged')]
    public function updateStep($step)
    {
        $this->currStep = $step;
    }

    public function render()
    {
        return view('livewire.applicant-form-header');
    }
}
