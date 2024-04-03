<div class="px-8 py-4 flex gap-4">
    {{-- Applicant Information --}}
    <div class="flex-[1] bg-white rounded-md shadow-md flex flex-col items-center gap-2 py-2">
        {{-- Applicant Photo --}}
        <div class="rounded-full border overflow-hidden w-[10rem] h-[10rem] border flex items-center justify-center">
            <img src="{{ asset($applicantDetail['applicant_photo']) }}" class="object-cover" alt="applicant photo profile">
        </div>
        <div class="w-full flex flex-col items-center justify-center">
            <p class="font-bold text-[2rem] text-sky-900">{{ $applicantDetail['fullname'] }}</p>
            <p class="text-[1.2rem] font-semibold text-sky-700">{{ $applied_string }}</p>
        </div>
        <div class="w-full px-4">
            <p class="text-sky-900 text-[1.6rem] font-bold py-2 border-t-2">Applied Job</p>
            <div class="bg-gray-100 rounded-lg p-4">
                <p class="text-sky-900 font-bold text-[1.8rem]">{{ $applicantDetail->job['position_name'] }}</p>
                <p class="text-sky-800 font-semibold text-[1.2rem]">{{ $applicantDetail->job['employment_type'] }}.
                    {{ $applicantDetail->job->branch['branch_name'] }}</p>
            </div>
        </div>
        <div class="flex items-center justify-center p-4 w-full">
            <div class="flex flex-col gap-4 border p-4 bg-white rounded-lg shadow-sm w-full">
                <div class="flex justify-between items-center relative" x-data="{ open: false }">
                    <div class="flex items-center gap-1 py-2 cursor-pointer" x-on:click="open = ! open">
                        <p class="text-[1.2rem] font-semibold text-sky-800">Status</p>
                        <template x-if="!open">
                            <i class="fa-solid fa-caret-down text-sky-800"></i>
                        </template>
                        <template x-if="open">
                            <i class="fa-solid fa-caret-up text-sky-800"></i>
                        </template>
                    </div>
                    <div class="flex items-center gap-2 py-2">
                        <i class="fa-solid fa-circle text-[1rem] {{ $colorStatus[$applicantStatus['status']] }}"></i>
                        <p class="text-[1.2rem] text-sky-900 font-semibold">
                            {{ $applicantStatus['status'] }}
                        </p>
                    </div>
                    {{-- Set Stage for applicant --}}
                    <div x-show="open" x-transition
                        class="absolute -bottom-[12.5rem] left-0 flex flex-col gap-2 rounded-lg bg-white shadow-md w-[20rem] px-4 py-2">
                        <div class="flex flex-col gap-2 border-b-2">
                            <p class="text-sky-900 text-[1.4rem] font-semibold">Current Stage</p>
                            <div class="flex items-center gap-2 py-2">
                                <i
                                    class="fa-solid fa-circle text-[1rem] {{ $colorStatus[$applicantStatus['status']] }}"></i>
                                <p class="text-[1.2rem] text-sky-900">
                                    {{ $applicantStatus['status'] }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <p class="text-sky-900 text-[1.4rem] font-semibold">Move To</p>
                            @if ($applicantDetail->applicationStatus['status_code'] == 1)
                                <div class="flex items-center gap-2 py-2 cursor-pointer" x-on:click="open = false"
                                    wire:click="updateApplicantStatus({{ $applicantDetail['id'] }}, 2)">
                                    <i class="fa-solid fa-circle text-[1rem] text-amber-500"></i>
                                    <p class="text-[1.2rem] text-sky-900">Screening</p>
                                </div>
                            @elseif ($applicantDetail->applicationStatus['status_code'] == 2)
                                <div class="flex items-center gap-2 py-2 cursor-pointer"
                                    wire:click="updateApplicantStatus({{ $applicantDetail['id'] }}, 3)"
                                    x-on:click="open = false">
                                    <i class="fa-solid fa-circle text-[1rem] text-yellow-500"></i>
                                    <p class="text-[1.2rem] text-sky-900">HR Interview</p>
                                </div>
                            @elseif ($applicantDetail->applicationStatus['status_code'] == 3)
                                <div class="flex items-center gap-2 py-2 cursor-pointer"
                                    wire:click="updateApplicantStatus({{ $applicantDetail['id'] }}, 4)"
                                    x-on:click="open = false">
                                    <i class="fa-solid fa-circle text-[1rem] text-lime-500"></i>
                                    <p class="text-[1.2rem] text-sky-900">Psikotest</p>
                                </div>
                            @elseif ($applicantDetail->applicationStatus['status_code'] == 4)
                                <div class="flex items-center gap-2 py-2 cursor-pointer"
                                    wire:click="updateApplicantStatus({{ $applicantDetail['id'] }}, 5)"
                                    x-on:click="open = false">
                                    <i class="fa-solid fa-circle text-[1rem] text-teal-500"></i>
                                    <p class="text-[1.2rem] text-sky-900">User Interview</p>
                                </div>
                            @elseif ($applicantDetail->applicationStatus['status_code'] == 5)
                                <div class="flex items-center gap-2 py-2 cursor-pointer"
                                    wire:click="updateApplicantStatus({{ $applicantDetail['id'] }}, 6)"
                                    x-on:click="open = false">
                                    <i class="fa-solid fa-circle text-[1rem] text-sky-500"></i>
                                    <p class="text-[1.2rem] text-sky-900">Offering</p>
                                </div>
                            @elseif ($applicantDetail->applicationStatus['status_code'] == 6)
                                <div class="flex items-center gap-2 py-2 cursor-pointer"
                                    wire:click="updateApplicantStatus({{ $applicantDetail['id'] }}, 7)"
                                    x-on:click="open = false">
                                    <i class="fa-solid fa-circle text-[1rem] text-green-500"></i>
                                    <p class="text-[1.2rem] text-sky-900">Medical Checkup</p>
                                </div>
                            @elseif($applicantDetail->applicationStatus['status_code'] == 7)
                                <div class="flex items-center gap-2 py-2 cursor-pointer"
                                    wire:click="updateApplicantStatus({{ $applicantDetail['id'] }}, 8)"
                                    x-on:click="open = false">
                                    <i class="fa-solid fa-circle text-[1rem] text-emerald-500"></i>
                                    <p class="text-[1.2rem] text-sky-900">Accepted</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="border flex rounded-full overflow-hidden">
                    <p
                        class="flex-1 text-center border-r-2 font-semibold text-[1.4rem] {{ $applicantStatus['status_code'] >= 1 ? 'bg-sky-700 text-white' : '' }}">
                        1</p>
                    <p
                        class="flex-1 text-center border-r-2 text-sky-900 font-semibold text-[1.4rem] {{ $applicantStatus['status_code'] >= 2 ? 'bg-sky-700 text-white' : '' }}">
                        2</p>
                    <p
                        class="flex-1 text-center border-r-2 text-sky-900 font-semibold text-[1.4rem] {{ $applicantStatus['status_code'] >= 3 ? 'bg-sky-700 text-white' : '' }}">
                        3</p>
                    <p
                        class="flex-1 text-center border-r-2 text-sky-900 font-semibold text-[1.4rem] {{ $applicantStatus['status_code'] >= 4 ? 'bg-sky-700 text-white' : '' }}">
                        4</p>
                    <p
                        class="flex-1 text-center border-r-2 text-sky-900 font-semibold text-[1.4rem] {{ $applicantStatus['status_code'] >= 5 ? 'bg-sky-700 text-white' : '' }}">
                        5</p>
                    <p
                        class="flex-1 text-center border-r-2 text-sky-900 font-semibold text-[1.4rem] {{ $applicantStatus['status_code'] >= 6 ? 'bg-sky-700 text-white' : '' }}">
                        6</p>
                    <p
                        class="flex-1 text-center border-r-2 text-sky-900 font-semibold text-[1.4rem] {{ $applicantStatus['status_code'] >= 7 ? 'bg-sky-700 text-white' : '' }}">
                        7</p>
                    <p
                        class="flex-1 text-center text-sky-900 font-semibold text-[1.4rem]  {{ $applicantStatus['status_code'] >= 8 ? 'bg-sky-700 text-white' : '' }}">
                        8</p>
                </div>
            </div>
        </div>
        <div class="p-4 w-full flex flex-col gap-4">
            <p class="text-sky-900 text-[1.6rem] font-bold">Contact Details</p>
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center">
                    <div class="bg-gray-100 rounded-full w-[3.5rem] h-[3.5rem] flex items-center justify-center">
                        <i class="fa-solid fa-envelope text-sky-900"></i>
                    </div>
                </div>
                <div class="flex flex-col w-full">
                    <p class="font-semibold text-sky-900 text-[1.4rem]">Email</p>
                    <p class="text-sky-950 text-[1.2rem]">{{ $applicantDetail['email'] }}</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center">
                    <div class="bg-gray-100 rounded-full w-[3.5rem] h-[3.5rem] flex items-center justify-center">
                        <i class="fa-solid fa-id-card text-sky-900"></i>
                    </div>
                </div>
                <div class="flex flex-col w-full">
                    <p class="font-semibold text-sky-900 text-[1.4rem]">KTP</p>
                    <p class="text-sky-950 text-[1.2rem]">{{ $applicantDetail['ktp_number'] }}</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center">
                    <div class="bg-gray-100 rounded-full w-[3.5rem] h-[3.5rem] flex items-center justify-center">
                        <i class="fa-solid fa-location-dot text-sky-900"></i>
                    </div>
                </div>
                <div class="flex flex-col w-full">
                    <p class="font-semibold text-sky-900 text-[1.4rem]">Address</p>
                    <p class="text-sky-950 text-[1.2rem]">{{ $applicantDetail['address'] }}
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center">
                    <div class="bg-gray-100 rounded-full w-[3.5rem] h-[3.5rem] flex items-center justify-center">
                        <i class="fa-brands fa-instagram text-sky-900"></i>
                    </div>
                </div>
                <div class="flex flex-col w-full">
                    <p class="font-semibold text-sky-900 text-[1.4rem]">Instagram</p>
                    <p class="text-sky-950 text-[1.2rem]">{{ $social_medias['instagram'] }}</p>
                </div>
            </div>
            @if ($social_medias['tiktok'])
                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-center">
                        <div class="bg-gray-100 rounded-full w-[3.5rem] h-[3.5rem] flex items-center justify-center">
                            <i class="fa-brands fa-tiktok text-sky-900"></i>
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <p class="font-semibold text-sky-900 text-[1.4rem]">TikTok</p>
                        <p class="text-sky-950 text-[1.2rem]">{{ $social_medias['tiktok'] }}</p>
                    </div>
                </div>
            @endif
        </div>

    </div>
    <div class="flex-[2] flex flex-col bg-white rounded-md shadow-md">
        {{-- Applicant Detail Header --}}
        <div class="border-b px-8 flex gap-2 justify-around items-center">
            {{-- Items Header --}}
            <div wire:click="setStep(1)"
                class="cursor-pointer {{ $currStep == 1 ? 'border-b-2 border-sky-800' : '' }} duration-100 p-4 flex items-center justify-center h-full">
                <p class="text-[1.2rem] text-center font-semibold text-sky-900">Applicant Info</p>
            </div>
            {{-- Items Header --}}
            <div wire:click="setStep(2)"
                class="cursor-pointer {{ $currStep == 2 ? 'border-b-2 border-sky-800' : '' }} duration-100 p-4 flex items-center justify-center h-full">
                <p class="text-[1.2rem] text-center font-semibold text-sky-900">Medical, Education & Skills</p>
            </div>
            {{-- Items Header --}}
            <div wire:click="setStep(3)"
                class="cursor-pointer {{ $currStep == 3 ? 'border-b-2 border-sky-800' : '' }} duration-100 p-4 flex items-center justify-center h-full">
                <p class="text-[1.2rem] text-center font-semibold text-sky-900">Employment Histories</p>
            </div>
            {{-- Items Header --}}
            <div wire:click="setStep(4)"
                class="cursor-pointer {{ ($currStep == 4) | ($currStep == 5) ? 'border-b-2 border-sky-800' : '' }} duration-100 p-4 flex items-center justify-center h-full">
                <p class="text-[1.2rem] text-center font-semibold text-sky-900">Additional Info</p>
            </div>
            {{-- Items Header --}}
            <div wire:click="setStep(6)"
                class="cursor-pointer {{ $currStep == 6 ? 'border-b-2 border-sky-800' : '' }} duration-100 p-4 flex items-center justify-center h-full">
                <p class="text-[1.2rem] text-center font-semibold text-sky-900">Documents</p>
            </div>
        </div>
        {{-- Applicant Detail Livewire component --}}
        <div class="px-8 py-4">
            <livewire:applicant-information :applicantDetail="$applicantDetail" :applicantIllness="$applicantDetail->applicantMedicalHistories" :applicantFamilies="$applicantDetail->applicantFamilies" :applicantEducations="$applicantDetail->applicantEducationHistories"
                :applicantSkills="$applicantDetail->applicantSkills" :applicantOccupations="$applicantDetail->applicantOccupationHistories" :applicantReference="$applicantDetail->applicantReferences" :applicantAdditionalInfo="$applicantDetail->applicantAdditionalInfo" :applicantDocuments="$applicantDetail->applicantDocuments" />
        </div>
    </div>
</div>
