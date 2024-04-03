<?php

namespace App\Livewire;

use App\Models\Applicant;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use WireUi\Traits\Actions;

class ApplicantForm extends Component
{
    use WithFileUploads;

    use Actions;

    public Applicant $applicant;

    // Define current step of the form 
    public $currStep = 1;

    // Define fields for applicant form 
    public $fullname, $email, $address, $job_id, $info_of_job, $applicant_photo, $birth_place, $birth_date, $gender, $religion, $marital_status, $blood_type, $height, $weight, $ktp_number, $hobby, $home_phone, $cell_phone, $office_phone, $parent_phone, $instagram, $tiktok, $term_and_co = false;

    // Applicant Families Fields
    public $applicantFamilies = [], $f_name, $f_gender, $f_age, $f_last_education, $f_employeer_name, $f_occupation, $f_relation;

    // Applicant Medical History fields
    public $applicantIllnesses = [], $illness_name, $illness_date, $illness_impact, $other_illness, $is_hiv = false, $is_tbc = false, $is_others = false;

    // Applicant Educational Background Fields
    public $applicantEducationHistories = [], $education_name, $education_category, $education_subject, $education_start_year, $education_end_year;

    // Applicant Skills Fields
    public $applicantLanguages = [], $applicantComputers = [], $applicantOrganizations = [], $language, $language_level, $language_remark, $computer, $comp_level, $comp_remark, $org_experience, $org_position, $org_event, $org_latest_jobdesc, $organization_structure;

    // Applicant employment history fields
    public $applicantEmploymentHistories = [], $company_name, $company_address, $company_phone, $latest_position, $salary, $direct_spv, $work_start_year, $work_end_year, $reason_of_leaving, $work_latest_jobdesc, $employeer_structure;

    // Applicant reference fields
    public $reference_name, $reference_relation, $reference_address, $reference_phone_number, $reference_remarks, $is_reference_filled;

    // Applicant Additional Information fields
    public $question1, $question2, $question3, $question4, $question5, $benefits, $ready_to_join, $strengths, $weaknesses, $happiest, $saddest, $achievement_question1, $achievement_question2, $achievement_question3, $achievement_question4, $failure_question1, $failure_question2, $failure_question3, $next_5years, $next_10years, $technical_skills, $attitude, $who_i_am, $criminal_case;

    // Applicant Documents fields
    public $ijazah, $transkrip_nilai, $cv, $application_letter, $ktp;

    // Save applicant into the databases
    public function storeApplicationForm()
    {
        // // Validate applicant documents
        $this->validate([
            'ijazah' => 'required|mimes:pdf|max:1024',
            'transkrip_nilai' => 'required|mimes:pdf|max:1024',
            'cv' => 'required|mimes:pdf|max:1024',
            'application_letter' => 'required|mimes:pdf|max:1024',
            'ktp' => 'required|mimes:pdf|max:1024',
            'term_and_co' => 'accepted',
        ], [
            '*.mimes' => 'File must be pdf',
            '*.max' => 'Maximum file size is 1 MB',
            'term_and_co.accepted' => 'You must check terms and condition applied!!',
            '*.required' => 'required'
        ]);

        // First step create applicant data
        if ($this->applicant_photo) {
            $filename = uniqid() . '_' . $this->applicant_photo->getClientOriginalName();
            $path = $this->applicant_photo->storeAs('applicantPhotos', $filename);

            $applicant = Applicant::create([
                'fullname' => $this->fullname,
                'email' => $this->email,
                'address' => $this->address,
                'info_of_job' => $this->info_of_job,
                'birth_place' => $this->birth_place,
                'birth_date' => $this->birth_date,
                'age' => Carbon::parse($this->birth_date)->age,
                'gender' => $this->gender,
                'religion' => $this->religion,
                'marital_status' => $this->marital_status,
                'blood_type' => $this->blood_type,
                'height' => $this->height,
                'weight' => $this->weight,
                'ktp_number' => $this->ktp_number,
                'hobby' => $this->hobby,
                'applicant_phones' => json_encode([
                    'home_phone' => $this->home_phone,
                    "cell_phone" => $this->cell_phone,
                    "office_phone" => $this->office_phone,
                    "parent_phone" => $this->parent_phone,
                ]),
                'social_medias' => json_encode([
                    "instagram" => $this->instagram,
                    "tiktok" => $this->tiktok,
                ]),
                'applicant_photo' => $path,
                'job_id' => 1
            ]);
        }

        // // If the family is exists, then save applicant families
        if ($this->applicantFamilies) {
            foreach ($this->applicantFamilies as $family) {
                $applicant->applicantFamilies()->create($family);
            }
        }

        // Applicant medical histories
        if ($this->applicantIllnesses) {
            $applicant->applicantMedicalHistories()->create([
                'illness' => json_encode($this->applicantIllnesses),
                'illness_impact' => $this->illness_impact,
                'remarks' => json_encode([
                    'is_tbc' => $this->is_tbc,
                    'is_hiv' => $this->is_hiv,
                    'is_others' => $this->is_others,
                    'other_illness' => $this->other_illness
                ])
            ]);
        }

        // Applicant Educational background
        if ($this->applicantEducationHistories) {
            foreach ($this->applicantEducationHistories as $applicantEducation) {
                $applicant->applicantEducationHistories()->create($applicantEducation);
            }
        }

        // Applicant SKills
        if ($this->applicantLanguages || $this->applicantComputers || $this->applicantOrganizations) {
            $applicant->applicantSkills()->create([
                'languages' => json_encode($this->applicantLanguages),
                'computers' => json_encode($this->applicantComputers),
                'organizations' => json_encode($this->applicantOrganizations),
                'latest_jobdesc' => $this->org_latest_jobdesc,
                'organization_structure' => $this->organization_structure,
            ]);
        }

        // Applicant Employment Histories
        if ($this->applicantEmploymentHistories) {
            $applicant->applicantOccupationHistories()->create([
                'occupations' => json_encode($this->applicantEmploymentHistories),
                'latest_jobdesc' => $this->work_latest_jobdesc,
                'organization_structure' => $this->employeer_structure,
            ]);
        }

        // Applicant References

        // Check if all the input fields is filled
        $this->is_reference_filled = $this->reference_name || $this->reference_address || $this->reference_phone_number || $this->reference_relation;

        // Store applicant references into database
        if ($this->is_reference_filled) {
            $applicant->applicantReferences()->firstOrCreate([
                'reference_name' => $this->reference_name,
                'reference_relation' => $this->reference_relation,
                'reference_address' => $this->reference_address,
                'phone_number' => $this->reference_phone_number,
                'remarks' => $this->reference_remarks,
            ]);
        }

        // Applicant Additional Information
        $applicant->applicantAdditionalInfo()->create([
            'additional_info' => json_encode([
                'question1' => $this->question1,
                'question2' => $this->question2,
                'question3' => $this->question3,
                'question4' => $this->question4,
                'question5' => $this->question5,
                'benefits' => $this->benefits,
                'ready_to_join' => $this->ready_to_join,
                'strengths' => $this->strengths,
                'weaknesses' => $this->weaknesses,
                'happiest' => $this->happiest,
                'saddest' => $this->saddest,
                'achievement_question1' => $this->achievement_question1,
                'achievement_question2' => $this->achievement_question2,
                'achievement_question3' => $this->achievement_question3,
                'achievement_question4' => $this->achievement_question4,
                'failure_question1' => $this->failure_question1,
                'failure_question2' => $this->failure_question2,
                'failure_question3' => $this->failure_question3,
                'next_5years' => $this->next_5years,
                'next_10years' => $this->next_10years,
                'technical_skills' => $this->technical_skills,
                'attitude' => $this->attitude,
                'who_i_am' => $this->who_i_am,
                'criminal_case' => $this->criminal_case,
            ])
        ]);

        // Upload applicant document 
        if ($this->ijazah && $this->application_letter && $this->cv && $this->ktp && $this->transkrip_nilai) {
            // Combine filename with uniqid
            $ijazah_filename = uniqid() . '_' . $this->ijazah->getClientOriginalName();
            $cv_filename = uniqid() . '_' . $this->cv->getClientOriginalName();
            $application_letter_filename = uniqid() . '_' . $this->application_letter->getClientOriginalName();
            $ktp_filename = uniqid() . '_' . $this->ktp->getClientOriginalName();
            $transkrip_nilai_filename = uniqid() . '_' . $this->transkrip_nilai->getClientOriginalName();

            // Store file into file storage
            $ijazah_path = $this->ijazah->storeAs('ijazah', $ijazah_filename);
            $cv_path = $this->cv->storeAs('cv', $cv_filename);
            $application_letter_path = $this->application_letter->storeAs('applicationLetters', $application_letter_filename);
            $ktp_path = $this->ktp->storeAs('ktp', $ktp_filename);
            $transkrip_nilai_path = $this->transkrip_nilai->storeAs('transkripNilai', $transkrip_nilai_filename);

            $applicant->applicantDocuments()->create([
                'ijazah' => $ijazah_path,
                'cv' => $cv_path,
                'application_letter' => $application_letter_path,
                'ktp' => $ktp_path,
                'transkrip_nilai' => $transkrip_nilai_path,
            ]);
        }

        // Update applicant data, to store terms and condition applied
        if ($this->term_and_co) {
            $applicant->term_and_co = $this->term_and_co;
            $applicant->save();
        }

        return redirect('/')->with('application-success', 'Application sent successfully!!');
    }

    // Validate fields data
    public function validateData()
    {
        if ($this->currStep == 1) {
            $this->validate(
                [
                    'fullname' => 'required',
                    'email' => 'required|email|unique:applicants',
                    'address' => 'required',
                    'info_of_job' => 'required',
                    'applicant_photo' => 'required|dimensions:min_width=300,min_height=400|image|mimes:png,jpg,jpeg',
                    'birth_place' => 'required',
                    'birth_date' => 'required',
                    'gender' => 'required',
                    'religion' => 'required',
                    'marital_status' => 'required',
                    'blood_type' => 'required',
                    'height' => 'required|regex:/[0-9]/',
                    'weight' => 'required|regex:/[0-9]/',
                    'ktp_number' => 'required|min:16|max:16|unique:applicants',
                    'hobby' => 'required',
                    'cell_phone' => 'required|min:10|max:13|regex:/[0-9]/',
                    'home_phone' => 'nullable|min:10|max:13|regex:/[0-9]/',
                    'office_phone' => 'nullable|min:10|max:13|regex:/[0-9]/',
                    'parent_phone' => 'required|min:10|max:13|regex:/[0-9]/',
                    'instagram' => 'required',
                    'applicantFamilies' => 'required',
                ],
                [
                    'applicant_photo.required' => 'Applicant photo must be filled!',
                    'applicantFamilies.required' => 'Families must be filled!',
                    'applicant_photo.mimes' => 'The image extension must be in png, jpg, or jpeg',
                    'applicant_photo.dimensions' => 'The image dimensions must be between 300x400 pixels.',
                    '*.required' => 'required!'
                ]
            );
        } else if ($this->currStep == 2) {
            $this->validate([
                'applicantEducationHistories' => 'required',
            ], [
                'applicantEducationHistories.required' => 'Education must be filled!'
            ]);
        } else if ($this->currStep == 3) {
            $this->validate([
                'reference_phone_number' => 'nullable|min:10|max:13|regex:/[0-9]/',
            ]);
        } else if ($this->currStep == 4) {
            $this->validate([
                'question1' => 'required',
                'question2' => 'required',
                'question3' => 'required',
                'question4' => 'required',
                'question5' => 'required',
                'benefits' => 'required',
                'ready_to_join' => 'required',
                'strengths' => 'required',
                'weaknesses' => 'required',
            ], ['*.required' => 'required!']);
        } else if ($this->currStep == 5) {
            $this->validate([
                'happiest' => 'required',
                'saddest' => 'required',
                'achievement_question1' => 'required',
                'achievement_question2' => 'required',
                'achievement_question3' => 'required',
                'achievement_question4' => 'required',
                'failure_question1' => 'required',
                'failure_question2' => 'required',
                'failure_question3' => 'required',
                'next_5years' => 'required',
                'next_10years' => 'required',
                'technical_skills' => 'required',
                'attitude' => 'required',
                'who_i_am' => 'required',
                'criminal_case' => 'required',
            ], ['*.required' => 'required!']);
        }
    }

    // Custom error messages
    public function messages()
    {
        return [
            '*.required' => 'required'
        ];
    }


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

    public function validateOccupationInputs()
    {
        $this->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'company_phone' => 'required|regex:/[0-9]/|min:10|max:13',
            'latest_position' => 'required',
            'salary' => 'required|regex:/[0-9]/|',
            'direct_spv' => 'required',
            'work_start_year' => 'required|size:4|regex:/[0-9]/|',
            'work_end_year' => 'required|size:4|regex:/[0-9]/|gte:work_start_year',
            'reason_of_leaving' => 'required',
        ], [
            '*.required' => 'required!',
            'work_start_year.regex' => 'Year must be numeric!',
            'work_end_year.regex' => 'Year must be numeric!',
            'salary.regex' => 'Salary must be numeric!',
            'company_phone.regex' => 'Phone Number must be numeric!',
        ]);
    }

    public function addNewApplicantOccupation()
    {
        $this->validateOccupationInputs();

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
        $this->validateFamilyInputs();

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

        $this->resetFamilyInputs();
    }

    // Remove applicant family from the array 
    public function removeApplicantFamily($idx)
    {
        unset($this->applicantFamilies[$idx]);
    }

    // Reset Family Structure Input
    public function resetFamilyInputs()
    {
        $this->f_name = '';
        $this->f_gender = '';
        $this->f_age = '';
        $this->f_employeer_name = '';
        $this->f_last_education = '';
        $this->f_occupation = '';
        $this->f_relation = '';
    }

    public function validateFamilyInputs()
    {
        $this->validate([
            'f_name' => 'required',
            'f_gender' => 'required',
            'f_employeer_name' => 'required',
            'f_age' => 'required',
            'f_last_education' => 'required',
            'f_occupation' => 'required',
            'f_relation' => 'required',
        ]);
    }

    // Add new applicant medical history
    public function addNewApplicantIllness()
    {
        $this->validateApplicantIllnessInputs();

        $this->applicantIllnesses[] = [
            'illness_name' => $this->illness_name,
            'illness_date' => $this->illness_date,
        ];

        $this->resetApplicantIllnessInputs();
    }

    // Remove applicant illness 
    public function removeApplicantIllness($idx)
    {
        unset($this->applicantIllnesses[$idx]);
    }

    // Validate Applicant Illness Inputs
    public function validateApplicantIllnessInputs()
    {
        $this->validate([
            'illness_name' => 'required',
            'illness_date' => 'required',
        ]);
    }

    // Reset Applicant Illness Inputs
    public function resetApplicantIllnessInputs()
    {
        $this->illness_name = '';
        $this->illness_date = '';
    }

    public function addNewApplicantEducation()
    {
        $this->validateApplicantEducationInputs();

        $this->applicantEducationHistories[] =
            [
                'education_name' => $this->education_name,
                'education_category' => $this->education_category,
                'education_subject' => $this->education_subject,
                'start_year' => $this->education_start_year,
                'end_year' => $this->education_end_year,
            ];

        $this->resetApplicantEducationInputs();
    }

    public function removeApplicantEducation($idx)
    {
        unset($this->applicantEducationHistories[$idx]);
    }

    // Validate Applicant Education Inputs
    public function validateApplicantEducationInputs()
    {
        $this->validate([
            'education_name' => 'required',
            'education_category' => 'required',
            'education_subject' => 'required',
            'education_start_year' => 'required|max:4|regex:/[0-9]/',
            'education_end_year' => 'required|max:4|regex:/[0-9]/|gte:education_start_year',
        ]);
    }

    // Reset Applicant Education Inputs
    public function resetApplicantEducationInputs()
    {
        $this->education_name = '';
        $this->education_category = '';
        $this->education_subject = '';
        $this->education_start_year = '';
        $this->education_end_year = '';
    }

    public function addNewApplicantLanguage()
    {
        $this->validateApplicantLanguageInputs();

        $this->applicantLanguages[] =
            [
                'language' => $this->language,
                'language_level' => $this->language_level,
                'language_remark' => $this->language_remark,
            ];

        $this->resetApplicantLanguageInputs();
    }

    public function removeApplicantLanguage($idx)
    {
        unset($this->applicantLanguages[$idx]);
    }

    // Validate Applicant Language Inputs
    public function validateApplicantLanguageInputs()
    {
        $this->validate([
            'language' => 'required',
            'language_level' => 'required',
        ]);
    }

    // Reset Applicant language Inputs
    public function resetApplicantLanguageInputs()
    {
        $this->language = '';
        $this->language_level = '';
        $this->language_remark = '';
    }

    public function addNewApplicantComputer()
    {
        $this->validateApplicantComputerInputs();

        $this->applicantComputers[] =
            [
                'computer' => $this->computer,
                'comp_level' => $this->comp_level,
                'comp_remark' => $this->comp_remark,
            ];

        $this->resetApplicantComputerInputs();
    }

    public function removeApplicantComputer($idx)
    {
        unset($this->applicantComputers[$idx]);
    }

    // Validate Applicant computer Inputs
    public function validateApplicantComputerInputs()
    {
        $this->validate([
            'computer' => 'required',
            'comp_level' => 'required',
        ]);
    }

    // Reset Applicant computer inputs
    public function resetApplicantComputerInputs()
    {
        $this->computer = '';
        $this->comp_level = '';
        $this->comp_remark = '';
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

        $this->resetApplicantOrganizationInputs();
    }

    public function removeApplicantOrganization($idx)
    {
        unset($this->applicantOrganizations[$idx]);
    }

    // Reset Applicant organization inputs
    public function resetApplicantOrganizationInputs()
    {
        $this->org_experience = '';
        $this->org_position = '';
        $this->org_event = '';
    }

    // Increase step 
    public function increaseStep()
    {
        $this->validateData();

        $this->currStep++;

        $this->dispatch('stepChanged', step: $this->currStep);
    }

    // Decrease step 
    public function decreaseStep()
    {
        $this->currStep--;

        $this->dispatch('stepChanged', step: $this->currStep);
    }

    public function render()
    {
        return view('livewire.applicant-form');
    }
}
