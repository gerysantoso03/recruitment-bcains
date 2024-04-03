<?php

namespace App\Livewire;

use App\Models\Applicant;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class ApplicantDetail extends Component
{
    public $currStep = 1, $applied_string = '', $social_medias, $applicantStatus;

    // Applicant Detail 
    public $applicantDetail = [];

    public Applicant $applicant;

    // Color list of applicant status
    public $colorStatus =
    [
        "New Applied" => "text-orange-500",
        "Screening" => "text-amber-500",
        "HR Interview" => "text-yellow-500",
        "Psikotest" => "text-lime-500",
        "User Interview" => "text-teal-500",
        "Offering" => "text-sky-500",
        "Medical Checkup" => "text-green-500",
        "Accepted" => "text-emerald-500",
    ];

    protected $listeners = ['applicantStatusUpdated' => 'refreshApplicant'];


    public function mount($applicantDetail)
    {
        $this->applicantDetail = $applicantDetail;
        $this->applicantStatus = $applicantDetail->applicationStatus;
        $this->social_medias = json_decode($applicantDetail['social_medias'], true);
        $this->appliedTimeAgo();
    }

    public function updateApplicantStatus($applicant_id, $new_status)
    {
        // Get current applicant data
        $applicant = Applicant::findOrFail($applicant_id);

        $applicant->update(['application_status_id' => $new_status]);

        // Emit an event to notify Livewire to re-render the component
        $this->dispatch('applicantStatusUpdated');
    }

    #[On('applicantStatusUpdated')]
    public function refreshApplicant()
    {
        // Update the applicant status if it has changed
        $updatedApplicantDetail = Applicant::findOrFail($this->applicantDetail['id']);
        $this->applicantStatus = $updatedApplicantDetail->applicationStatus;
    }

    public function appliedTimeAgo()
    {

        $appliedDate = Carbon::parse($this->applicantDetail['application_date']);
        $now = Carbon::now();
        $diff = $now->diffInYears($appliedDate);

        if ($diff > 0) {
            $this->applied_string = "Applied $diff year" . ($diff > 1 ? 's' : '') . " ago";
        } else {
            $diff = $now->diffInMonths($appliedDate);
            if ($diff > 0) {
                $this->applied_string = "Applied $diff month" . ($diff > 1 ? 's' : '') . " ago";
            } else {
                $diff = $now->diffInDays($appliedDate);
                if ($diff > 0) {
                    $this->applied_string = "Applied $diff day" . ($diff > 1 ? 's' : '') . " ago";
                } else {
                    $this->applied_string = "Applied today";
                }
            }
        }
    }

    // Increase step 
    public function setStep($step)
    {

        $this->currStep = $step;

        $this->dispatch('stepChanged', step: $this->currStep);
    }

    public function render()
    {
        return view('livewire.applicant-detail');
    }
}
