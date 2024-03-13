<?php

namespace App\Livewire;

use App\Models\Applicant;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ApplicantForm extends Component
{
    use WithFileUploads;

    public Applicant $applicant;

    // Define current step of the form 
    public $currStep = 6;

    // Define fields for applicant form 
    public $fullname, $email, $address, $job_id, $info_of_job, $applicant_photo, $birth_place, $birth_date, $gender, $religion, $marital_status, $height, $weight, $ktp_number, $hobby, $home_phone, $cell_phone, $office_phone, $parent_phone;

    // Applicant Families Fields
    public $applicantFamilies = [], $f_name, $f_gender, $f_age, $f_last_education, $f_employeer_name, $f_occupation, $f_relation;

    // Applicant Medical History fields
    public $applicantIllnesses = [], $illness_name, $illness_date, $illness_impact, $other_illness, $is_hiv, $is_tbc, $is_others;

    // Applicant Educational Background Fields
    public $applicantEducationHistories = [], $education_name, $education_category, $education_subject, $education_start_year, $education_end_year;

    // Applicant Skills Fields
    public $applicantLanguages = [], $applicantComputers = [], $applicantOrganizations = [], $language, $language_level, $language_remark, $computer, $comp_level, $comp_remark, $org_experience, $org_position, $org_event, $org_latest_jobdesc, $organization_structure;

    // Applicant employment history fields
    public $applicantEmploymentHistories = [], $company_name, $company_address, $company_phone, $latest_position, $salary, $direct_spv, $work_start_year, $work_end_year, $reason_of_leaving, $work_latest_jobdesc, $employeer_structure;

    // Applicant reference fields
    public $reference_name, $reference_relation, $reference_address, $reference_phone_number, $reference_remarks;

    // Applicant Additional Information fields


    // Employment Histories Functions
    public function resetOccupationInputs()
    {
        $this->company_name = '';
        $this->company_address = '';
        $this->company_phone = '';
        $this->latest_position = '';
        $this->salary = '';
        $this->direct_spv = '';
        $this->work_start_year = '';
        $this->work_end_year = '';
        $this->reason_of_leaving = '';
    }

    public function addNewApplicantOccupation()
    {
        // $this->validate([
        //     'company_name' => 'required',
        //     'company_address' => 'required',
        //     'company_phone' => 'required|regex:/[0-9]/|min:11|max:13',
        //     'latest_position' => 'required',
        //     'salary' => 'required|integer',
        //     'direct_spv' => 'required',
        //     'work_start_year' => 'required|integer',
        //     'work_end_year' => 'required|integer',
        //     'reason_of_leaving' => 'required',
        // ]);


        $this->applicantEmploymentHistories[] = [
            'company_name' => $this->company_name,
            'company_address' => $this->company_address,
            'company_phone' => $this->company_phone,
            'latest_position' => $this->latest_position,
            'salary' => $this->salary,
            'direct_spv' => $this->direct_spv,
            'work_start_year' => $this->work_start_year,
            'work_end_year' => $this->work_end_year,
            'reason_of_leaving' => $this->reason_of_leaving,
        ];

        // Reset input form
        $this->resetOccupationInputs();
    }

    public function removeApplicantOccupation($idx)
    {
        unset($this->applicantEmploymentHistories[$idx]);
    }

    public function toggleAccordionOccupation($idx)
    {
        $this->applicantEmploymentHistories[$idx] = !$this->applicantEmploymentHistories[$idx];
    }

    // Add new applicant families into the array
    public function addNewApplicantFamily()
    {
        $this->applicantFamilies[] =
            [
                'relation' => $this->f_relation,
                'family_name' => $this->f_name,
                'gender' => $this->f_gender,
                'age' => $this->f_age,
                'last_education' => $this->f_last_education,
                'occupation' => $this->f_occupation,
                'employeer_name' => $this->f_employeer_name,
            ];
    }

    // Remove applicant family from the array 
    public function removeApplicantFamily($idx)
    {
        unset($this->applicantFamilies[$idx]);
    }

    // Add new applicant medical history
    public function addNewApplicantIllness()
    {
        $this->applicantIllnesses[] = [
            'illness_name' => $this->illness_name,
            'illness_date' => $this->illness_date,
        ];
    }

    // Remove applicant illness 
    public function removeApplicantIllness($idx)
    {
        unset($this->applicantIllnesses[$idx]);
    }

    public function addNewApplicantEducation()
    {
        $this->applicantEducationHistories[] =
            [
                'education_name' => $this->education_name,
                'education_category' => $this->education_category,
                'education_subject' => $this->education_subject,
                'start_year' => $this->education_start_year,
                'end_year' => $this->education_end_year,
            ];
    }

    public function removeApplicantEducation($idx)
    {
        unset($this->applicantEducationHistories[$idx]);
    }

    public function addNewApplicantLanguage()
    {
        $this->validate([
            'language' => 'required',
            'language_level' => 'required',
            'language_remark' => 'required',
        ]);

        $this->applicantLanguages[] =
            [
                'language' => $this->language,
                'language_level' => $this->language_level,
                'language_remark' => $this->language_remark,
            ];
    }

    public function removeApplicantLanguage($idx)
    {
        unset($this->applicantLanguages[$idx]);
    }

    public function addNewApplicantComputer()
    {
        $this->validate([
            'computer' => 'required',
            'comp_level' => 'required',
            'comp_remark' => 'required',
        ]);

        $this->applicantComputers[] =
            [
                'computer' => $this->computer,
                'comp_level' => $this->comp_level,
                'comp_remark' => $this->comp_remark,
            ];
    }

    public function removeApplicantComputer($idx)
    {
        unset($this->applicantComputers[$idx]);
    }

    public function addNewApplicantOrganization()
    {
        $this->validate([
            'org_experience' => 'required',
            'org_position' => 'required',
            'org_event' => 'required',
        ]);

        $this->applicantOrganizations[] =
            [
                'org_experience' => $this->org_experience,
                'org_position' => $this->org_position,
                'org_event' => $this->org_event,
            ];
    }

    public function removeApplicantOrganization($idx)
    {
        unset($this->applicantOrganizations[$idx]);
    }


    // Increase step 
    public function increaseStep()
    {
        $this->currStep++;
    }

    // Decrease step 
    public function decreaseStep()
    {
        $this->currStep--;
    }

    public function render()
    {
        return view('livewire.applicant-form');
    }
}
