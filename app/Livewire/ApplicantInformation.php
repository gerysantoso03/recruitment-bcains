<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;

class ApplicantInformation extends Component
{
    // Applicant families and educations
    public $applicantFamilies = [], $applicantEducations, $applicantReference, $applicantDetail, $applicantPhones, $applicantDocuments;

    // Applicant Skills
    public $languageSkill, $compSkill, $applicantOrg, $org_jobdesc, $org_structure;

    // Applicant medical histories
    public $applicantMedicalHistories, $Illness, $illnessRemarks;

    // Applicant occupation histories
    public $occupations, $work_jobdesc, $work_structure;

    // Applicant Additional Info
    public $additionalInfo;

    public $currStep = 1, $docStep = 1;

    public function mount($applicantDetail, $applicantIllness, $applicantSkills, $applicantOccupations, $applicantAdditionalInfo)
    {
        if (!empty($applicantIllness[0])) {
            $this->applicantMedicalHistories = $applicantIllness[0];
            $this->Illness = $applicantIllness[0]['illness'];
            $this->illnessRemarks = json_decode($applicantIllness[0]['remarks'], true);
        }

        if (!empty($applicantSkills[0])) {
            $this->languageSkill = json_decode($applicantSkills[0]['languages'], true);
            $this->compSkill = json_decode($applicantSkills[0]['computers'], true);
            $this->applicantOrg = json_decode($applicantSkills[0]['organizations'], true);
            $this->org_jobdesc = $applicantSkills[0]['latest_jobdesc'];
            $this->org_structure = $applicantSkills[0]['organization_structure'];
        }

        if (!empty($applicantOccupations[0])) {
            $this->occupations = json_decode($applicantOccupations[0]['occupations'], true);
            $this->work_jobdesc = $applicantOccupations[0]['latest_jobdesc'];
            $this->work_structure = $applicantOccupations[0]['organization_structure'];
        }

        $this->additionalInfo = json_decode($applicantAdditionalInfo['additional_info'], true);
        $this->applicantPhones = json_decode($applicantDetail['applicant_phones'], true);
    }

    #[On('stepChanged')]
    public function getStep($step)
    {
        $this->currStep = $step;
    }

    #[On('stepChanged')]
    public function setStep($step)
    {
        $this->currStep = $step;
    }

    public function setDocStep($step)
    {
        $this->docStep = $step;
    }

    public function render()
    {
        return view('livewire.applicant-information');
    }
}
