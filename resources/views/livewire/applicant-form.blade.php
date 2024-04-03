{{-- Form Wrapper / Root elements of the component --}}
<div class="flex flex-col gap-4 max-w-[120rem]">
    <x-notifications />
    {{-- General Information Form - Step 1 --}}
    @if ($currStep == 1)
        <div class="border-2 border-sky-800 rounded-xl p-8 flex flex-col gap-8">
            {{-- General Info - First Section --}}
            <div class="flex gap-4">
                {{-- General Info - First Section - First Wrapper --}}
                <div class="flex flex-[1.5] flex-col gap-4">
                    <x-input wire:model="fullname" label="Fullname" corner-hint="Ex: Gery Santoso" />
                    <x-input wire:model="email" label="Email" corner-hint="Ex: gery@yahoo.com" />
                    <x-input wire:model="address" label="Address"
                        corner-hint="Ex: Jl. Kaliurang No.20, Kebayoran, Jakarta" />
                    <x-input wire:model="job_id" readonly label="Position Applied" />
                    <x-input wire:model="info_of_job" label="Information of Job"
                        corner-hint="Ex: Linkedin, Instagram, Job Street" />
                </div>
                {{-- General Info - First Section - Applicant Photo --}}
                <div class="flex flex-col gap-8 flex-1 justify-center items-center">
                    {{-- Applicant Photo Preview --}}
                    <div
                        class="border border-sky-950 overflow-hidden rounded-lg w-60 h-72 flex items-center justify-center">
                        @if ($applicant_photo)
                            <img id="previewApplicant" src="{{ $applicant_photo->temporaryUrl() }}"
                                alt="applicant photo" class="object-cover" />
                        @endif
                    </div>
                    <input
                        class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                        wire:model="applicant_photo" name="applicant_photo" id="file_input" type="file" />
                    @error('applicant_photo')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            {{-- General Info - Second Section --}}
            <div class="flex gap-4">
                {{-- General Info - Second Section - First Wrapper --}}
                <div class="flex flex-col flex-1 gap-4">
                    <x-datetime-picker label="Birth Date" placeholder="Birth Date" wire:model="birth_date"
                        without-time />
                    <x-input wire:model="birth_place" label="Birth Place" corner-hint="Ex: Jakarta, Bali" />
                    <x-input label="Mobile Phone" wire:model="cell_phone" corner-hint="Ex: 087888392032" />
                    <x-input label="Home Telephone" wire:model="home_phone" corner-hint="Ex: 02189430233" />
                </div>
                {{-- General Info - Second Section - Second Wrapper --}}
                <div class="flex flex-col flex-1 gap-4">
                    <x-select label="Religion" wire:model="religion" placeholder="Select one religion"
                        :options="['Katolik', 'Kristen Protestan', 'Islam', 'Hindu', 'Buddha', 'Khonghucu']" />
                    <x-select label="Gender" wire:model="gender" placeholder="Select one gender" :options="['Male', 'Female', 'Others']" />
                    <x-input label="Parent's Telephone" wire:model="parent_phone" corner-hint="Ex: 087888392032" />
                    <x-input label="Office Telephone" wire:model="office_phone" corner-hint="Ex: 02189430233" />
                </div>
            </div>
            {{-- General Info - Third Section --}}
            <div class="flex gap-4">
                {{-- General Info - Third Section - First Wrapper --}}
                <div class="flex flex-col flex-1 gap-4">
                    <x-select label="Marital Status" wire:model="marital_status" placeholder="Select one status"
                        :options="['Single', 'Married']" />
                    <x-select label="Blood Type" wire:model="blood_type" placeholder="Select one type"
                        :options="['O', 'A', 'B', 'AB']" />
                    <x-inputs.number wire:model="height" placeholder="0" label="Height" corner-hint="cm" />
                    <x-inputs.number wire:model="weight" label="Weight" placeholder="0" corner-hint="kg" />
                </div>
                {{-- General Info - Third Section - Second Wrapper --}}
                <div class="flex flex-col flex-1 gap-4">
                    <x-input wire:model="ktp_number" label="No. KTP" corner-hint="Must be in 16 digit number" />
                    <x-input wire:model="hobby" label="Hobby" corner-hint="Ex: Soccer, Cycling, Boxing" />
                    <x-input label="Instagram" wire:model="instagram" corner-hint="Ex: santi20" />
                    <x-input label="Tiktok/Others" wire:model="tiktok" corner-hint="Ex: SantiTiktokers" />
                </div>
            </div>
            {{-- Family Structure Form --}}
            <div class="flex flex-col gap-4 ">
                <h3 class="font-semibold text-[2rem] text-sky-900">Family Structure</h3>
                @error('applicantFamilies')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
                {{-- Family Structure Table --}}
                <div class="flex flex-col">
                    <table class="min-w-full text-left text-sm font-light overflow-x-auto" id="familyStructureTable">
                        {{-- Family Structure Table Head --}}
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Relation</th>
                                <th scope="col" class="px-6 py-4">Name</th>
                                <th scope="col" class="px-6 py-4">Gender</th>
                                <th scope="col" class="px-6 py-4">Age</th>
                                <th scope="col" class="px-6 py-4">Education</th>
                                <th scope="col" class="px-6 py-4">Occupation</th>
                                <th scope="col" class="px-6 py-4">Employeer's Name</th>
                                <th scope="col" class="px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Family Structure Table Input --}}
                            <tr
                                class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                <td class="whitespace-nowrap px-6 py-4">
                                    <x-select placeholder="Select relation" :options="['Spouse', 'Child', 'Father']"
                                        wire:model.defer="f_relation" />
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                    <x-input id="familyStructureName" wire:model="f_name" />
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <x-select placeholder="Select gender" :options="['Male', 'Female']"
                                        wire:model.defer="f_gender" />
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <x-inputs.number placeholder="0" wire:model="f_age" />
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <x-input wire:model="f_last_education" />
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <x-input wire:model="f_occupation" />
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <x-input wire:model="f_employeer_name" />
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div wire:click.prevent="addNewApplicantFamily"
                                        class="flex items-center justify-center cursor-pointer text-[1.4rem] text-sky-800 border border-sky-800 w-10 h-10 rounded-lg hover:text-sky-600 hover:border-sky-600 duration-750">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </td>
                            </tr>
                            {{-- Iterate family structures --}}
                            @foreach ($applicantFamilies as $idx => $applicantFamily)
                                <tr
                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-input class="pointer-events-none"
                                            wire:model="applicantFamilies.{{ $idx }}.relation" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-input class="pointer-events-none"
                                            wire:model="applicantFamilies.{{ $idx }}.family_name" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-input class="pointer-events-none"
                                            wire:model="applicantFamilies.{{ $idx }}.gender" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-input class="pointer-events-none"
                                            wire:model="applicantFamilies.{{ $idx }}.age" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-input class="pointer-events-none"
                                            wire:model="applicantFamilies.{{ $idx }}.last_education" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-input class="pointer-events-none"
                                            wire:model="applicantFamilies.{{ $idx }}.occupation" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-input class="pointer-events-none"
                                            wire:model="applicantFamilies.{{ $idx }}.employeer_name" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <div wire:click.prevent="removeApplicantFamily({{ $idx }})"
                                            class="flex items-center justify-center cursor-pointer text-[1.4rem] text-red-800 border border-sky-800 w-10 h-10 rounded-lg hover:text-red-600 hover:border-sky-600 duration-750">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- Family Structure Table Content --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    {{-- Medical & Last Education History - Step 2 --}}
    @if ($currStep == 2)
        <div class="border-2 border-sky-800 rounded-xl p-8 flex flex-col gap-8">
            {{-- Applicant medical history section --}}
            <div class="flex flex-col gap-2">
                <h3 class="text-[2rem] text-sky-900 font-semibold">Medical History</h3>
                <div class="border border-sky-900 p-4 rounded-lg">
                    <p class="font-semibold text-[1.5rem] text-sky-900">Do you have a serious illness / had a serious
                        accident?</p>
                    {{-- Applicant Illness Table --}}
                    <div class="flex flex-col mb-4">
                        <table class="min-w-full text-left text-sm font-light overflow-x-auto"
                            id="familyStructureTable">
                            {{-- Applicant Medical History Table Head --}}
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Illness Date</th>
                                    <th scope="col" class="px-6 py-4">Disease / Illness</th>
                                    <th scope="col" class="px-6 py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Applicant Medical History Table Input --}}
                                <tr
                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="whitespace-nowrap px-6 py-4 w-[29%]">
                                        <x-datetime-picker wire:model="illness_date" without-time />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-input wire:model="illness_name" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 w-[1%]">
                                        <div wire:click.prevent="addNewApplicantIllness"
                                            class="flex items-center justify-center cursor-pointer text-[1.4rem] text-sky-800 border border-sky-800 w-10 h-10 rounded-lg hover:text-sky-600 hover:border-sky-600 duration-750">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                    </td>
                                </tr>
                                {{-- Applicant Medical Histories Table Content --}}
                                @foreach ($applicantIllnesses as $idx => $illness)
                                    <tr
                                        class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                        <td class="whitespace-nowrap px-6 py-4 w-[29%]">
                                            <x-input class="pointer-events-none"
                                                value="{{ $illness['illness_date'] }}" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">
                                            <x-input class="pointer-events-none"
                                                value="{{ $illness['illness_name'] }}" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 w-[1%]">
                                            <div wire:click.prevent="removeApplicantIllness({{ $idx }})"
                                                class="flex items-center justify-center cursor-pointer text-[1.4rem] text-red-800 border border-sky-800 w-10 h-10 rounded-lg hover:text-red-600 hover:border-sky-600 duration-750">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> {{-- End of applicant illness table --}}
                    {{-- Applicant Illness impact --}}
                    <div class="flex gap-4">
                        <div class="flex flex-[1.5] flex-col gap-2">
                            <p class="font-semibold text-[1.5rem] text-sky-900">What is the current impacts?</p>
                            <x-textarea wire:model="illness_impact" placeholder="write the impacts" />
                        </div>
                        <div class="flex flex-col gap-2 flex-[1]">
                            <p class="font-semibold text-[1.5rem] text-sky-900">Do you have any history of
                                diseases?</p>
                            <div class="flex flex-col gap-4">
                                <x-checkbox md wire:model.defer="is_tbc" label="TBC" />
                                <x-checkbox md wire:model.defer="is_hiv" label="HIV/AIDS" />
                                <div class="flex justify-center items-center gap-8" x-data="{ isOthers: @entangle('checkboxValue').defer == false }">
                                    <x-checkbox md wire:model.defer="is_others" x-model="isOthers" label="Others" />
                                    <x-input x-bind:disabled="!isOthers" wire:model="other_illness" />
                                </div>
                            </div>
                        </div>
                    </div> {{-- End fo applicant illness impact --}}
                </div>
            </div> {{-- End of applicant medical section --}}

            {{-- Applicant education history section --}}
            <div class="flex flex-col gap-2">
                <h3 class="text-[2rem] text-sky-900 font-semibold">Educational Background</h3>
                <div class="border border-sky-900 p-4 rounded-lg">
                    {{-- Applicant Education histories Table --}}
                    <div class="flex flex-col">
                        <table class="min-w-full text-left text-sm font-light overflow-x-auto"
                            id="familyStructureTable">
                            {{-- Applicant Educational History Table Head --}}
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Education</th>
                                    <th scope="col" class="px-6 py-4">Name</th>
                                    <th scope="col" class="px-6 py-4">Major / Subject</th>
                                    <th scope="col" class="px-6 py-4">Start Year</th>
                                    <th scope="col" class="px-6 py-4">End Year</th>
                                    <th scope="col" class="px-6 py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Applicant Educational History Table Input --}}
                                <tr
                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <x-select placeholder="Select education" :options="['Senior High School', 'Bachelor', 'Non-Formal']"
                                            wire:model.defer="education_category" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-input wire:model="education_name" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-input wire:model="education_subject" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium w-[10%]">
                                        <x-input wire:model="education_start_year" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium w-[10%]">
                                        <x-input wire:model="education_end_year" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div wire:click.prevent="addNewApplicantEducation"
                                            class="flex items-center justify-center cursor-pointer text-[1.4rem] text-sky-800 border border-sky-800 w-10 h-10 rounded-lg hover:text-sky-600 hover:border-sky-600 duration-750">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                    </td>
                                </tr>
                                {{-- Applicant Educational History Table Content --}}
                                @foreach ($applicantEducationHistories as $idx => $education)
                                    <tr
                                        class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-input class="pointer-events-none"
                                                value="{{ $education['education_category'] }}" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-input class="pointer-events-none"
                                                value="{{ $education['education_name'] }}" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-input class="pointer-events-none"
                                                value="{{ $education['education_subject'] }}" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-input class="pointer-events-none"
                                                value="{{ $education['start_year'] }}" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-input class="pointer-events-none"
                                                value="{{ $education['end_year'] }}" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <div wire:click.prevent="removeApplicantEducation({{ $idx }})"
                                                class="flex items-center justify-center cursor-pointer text-[1.4rem] text-red-800 border border-sky-800 w-10 h-10 rounded-lg hover:text-red-600 hover:border-sky-600 duration-750">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> {{-- End of applicant educatinal history table --}}
                </div>
            </div> {{-- End of applicant education history section --}}

            {{-- Applicant Skills Section --}}
            <div class="flex flex-col gap-4">
                <h3 class="text-[2rem] text-sky-900 font-semibold">Skills</h3>

                {{-- Applicant language skills Table --}}
                <div class="border border-sky-900 p-4 rounded-lg">
                    <h4 class="text-[1.5rem] text-sky-900 font-semibold">Languages</h4>
                    <div class="flex flex-col">
                        <table class="min-w-full text-left text-sm font-light overflow-x-auto"
                            id="familyStructureTable">
                            {{-- Applicant Educational History Table Head --}}
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Language</th>
                                    <th scope="col" class="px-6 py-4">Mastering Level</th>
                                    <th scope="col" class="px-6 py-4">Remarks</th>
                                    <th scope="col" class="px-6 py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Applicant Language  Table Input --}}
                                <tr
                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <x-input wire:model="language" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-select placeholder="Select level" :options="['Very Good', 'Good', 'Fair', 'Poor']"
                                            wire:model.defer="language_level" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-input wire:model="language_remark" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 w-[1%]">
                                        <div wire:click.prevent="addNewApplicantLanguage"
                                            class="flex items-center justify-center cursor-pointer text-[1.4rem] text-sky-800 border border-sky-800 w-10 h-10 rounded-lg hover:text-sky-600 hover:border-sky-600 duration-750">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                    </td>
                                </tr>
                                {{-- Applicant Language Table Content --}}
                                @foreach ($applicantLanguages as $idx => $language)
                                    <tr
                                        class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-input class="pointer-events-none"
                                                value="{{ $language['language'] }}" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-input class="pointer-events-none"
                                                value="{{ $language['language_level'] }}" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-input class="pointer-events-none"
                                                value="{{ $language['language_remark'] }}" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 w-[1%]">
                                            <div wire:click.prevent="removeApplicantLanguage({{ $idx }})"
                                                class="flex items-center justify-center cursor-pointer text-[1.4rem] text-red-800 border border-sky-800 w-10 h-10 rounded-lg hover:text-red-600 hover:border-sky-600 duration-750">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> {{-- End of language skills history table --}}

                {{-- Applicant computer skills Table --}}
                <div class="border border-sky-900 p-4 rounded-lg">
                    <h4 class="text-[1.5rem] text-sky-900 font-semibold">Computers</h4>
                    <div class="flex flex-col">
                        <table class="min-w-full text-left text-sm font-light overflow-x-auto"
                            id="familyStructureTable">
                            {{-- Applicant Computer Table Head --}}
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Computers</th>
                                    <th scope="col" class="px-6 py-4">Mastering Level</th>
                                    <th scope="col" class="px-6 py-4">Remarks</th>
                                    <th scope="col" class="px-6 py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Applicant Computer Table Input --}}
                                <tr
                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <x-input wire:model="computer" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-select placeholder="Select level" :options="['Very Good', 'Good', 'Fair', 'Poor']"
                                            wire:model.defer="comp_level" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-input wire:model="comp_remark" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 w-[1%]">
                                        <div wire:click.prevent="addNewApplicantComputer"
                                            class="flex items-center justify-center cursor-pointer text-[1.4rem] text-sky-800 border border-sky-800 w-10 h-10 rounded-lg hover:text-sky-600 hover:border-sky-600 duration-750">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                    </td>
                                </tr>
                                {{-- Applicant Computer Table Content --}}
                                @foreach ($applicantComputers as $idx => $computer)
                                    <tr
                                        class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-input class="pointer-events-none"
                                                wire:model="applicantComputers.{{ $idx }}.computer" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-input class="pointer-events-none"
                                                wire:model="applicantComputers.{{ $idx }}.comp_level" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-input class="pointer-events-none"
                                                wire:model="applicantComputers.{{ $idx }}.comp_remark" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 w-[1%]">
                                            <div wire:click.prevent="removeApplicantComputer({{ $idx }})"
                                                class="flex items-center justify-center cursor-pointer text-[1.4rem] text-red-800 border border-sky-800 w-10 h-10 rounded-lg hover:text-red-600 hover:border-sky-600 duration-750">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> {{-- End of computer skills history table --}}

                {{-- Applicant Organization skills Table --}}
                <div class="border border-sky-900 p-4 rounded-lg">
                    <h4 class="text-[1.5rem] text-sky-900 font-semibold">Organizations</h4>
                    <div class="flex flex-col">
                        <table class="min-w-full text-left text-sm font-light overflow-x-auto"
                            id="familyStructureTable">
                            {{-- Applicant Organization History Table Head --}}
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Organization Experience</th>
                                    <th scope="col" class="px-6 py-4">Position</th>
                                    <th scope="col" class="px-6 py-4">Events</th>
                                    <th scope="col" class="px-6 py-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Applicant organization History Table Input --}}
                                <tr
                                    class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <x-input wire:model="org_experience" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-input wire:model="org_position" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-input wire:model="org_event" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 w-[1%]">
                                        <div wire:click.prevent="addNewApplicantOrganization"
                                            class="flex items-center justify-center cursor-pointer text-[1.4rem] text-sky-800 border border-sky-800 w-10 h-10 rounded-lg hover:text-sky-600 hover:border-sky-600 duration-750">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                    </td>
                                </tr>
                                {{-- Applicant computer History Table Content --}}
                                @foreach ($applicantOrganizations as $idx => $org)
                                    <tr
                                        class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-input class="pointer-events-none"
                                                value="{{ $org['org_experience'] }}" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-input class="pointer-events-none"
                                                value="{{ $org['org_position'] }}" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <x-input class="pointer-events-none" value="{{ $org['org_event'] }}" />
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 w-[1%]">
                                            <div wire:click.prevent="removeApplicantOrganization({{ $idx }})"
                                                class="flex items-center justify-center cursor-pointer text-[1.4rem] text-red-800 border border-sky-800 w-10 h-10 rounded-lg hover:text-red-600 hover:border-sky-600 duration-750">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> {{-- End of Organization skills history table --}}
                    <div class="flex gap-4 mt-4">
                        <div class="flex-1">
                            <x-textarea wire:model="org_latest_jobdesc" label="Job Description in Current Org" />
                        </div>
                        <div class="flex-1">
                            <x-textarea wire:model="organization_structure" label="Organization Structures" />
                        </div>
                    </div>
                </div>
            </div> {{-- End of applicant skills section --}}
        </div>
    @endif

    {{-- Employment History - Step 3 --}}
    @if ($currStep == 3)
        <div class="border-2 border-sky-800 rounded-xl p-8 flex flex-col gap-6">
            <h3 class="font-semibold text-[2rem] text-sky-900">Employment History <span
                    class="block text-[1rem] text-sky-900">Starting from the most recent job</span></h3>
            {{-- Applicant Work History Form --}}
            <div class="flex flex-col gap-2">
                <div class="flex items-center justify-between relative">
                    <div class="flex items-center justify-between gap-4">
                        <x-input wire:model="work_start_year" placeholder="Start year" />
                        <i class="fa-solid fa-minus"></i>
                        <x-input wire:model="work_end_year" placeholder="End year" />
                    </div>
                    <div wire:click.prevent="addNewApplicantOccupation()"
                        class="flex items-center justify-center gap-1 cursor-pointer text-[1.2rem] text-sky-800 border border-sky-900 p-2 rounded-lg font-semibold hover:text-sky-600 hover:border-sky-600 duration-750">
                        <i class="fa-solid fa-plus"></i> Add Job
                    </div>
                </div>
                <div class="flex gap-4">
                    <div class="flex flex-col gap-2 flex-1">
                        <x-input label="Company Name" wire:model="company_name" />
                        <x-input label="Address" wire:model="company_address" />
                        <x-input label="Company Phone Number" wire:model="company_phone" />
                    </div>
                    <div class="flex flex-col gap-2 flex-1">
                        <x-input label="Latest Position" wire:model="latest_position" />
                        <x-input label="Salary" wire:model="salary" />
                        <x-input label="Direct Supervisor" wire:model="direct_spv" />
                    </div>
                </div>
                <div>
                    <x-textarea wire:model="reason_of_leaving" label="Reason of leaving" />
                </div>
            </div> {{-- End of applicant work history form --}}

            {{-- Applicant work history content --}}
            @foreach ($applicantEmploymentHistories as $idx => $occupation)
                <div class="flex flex-col gap-4 border border-sky-900 rounded-xl p-4" x-data="{ open: false }">
                    <div class="flex items-center justify-between cursor-pointer" @click="open = !open">
                        <div class="flex-1 flex flex-col">
                            <p class="text-[1.8rem] text-sky-900 font-semibold">{{ $occupation['latest_position'] }}
                            </p>
                            <div class="flex justify-start items-center gap-2">
                                <p class="font-semibold text-sky-900 text-[1.4rem]">
                                    {{ $occupation['work_start_year'] }}</p>
                                <i class="fa-solid fa-minus"></i>
                                <p class="font-semibold text-sky-900 text-[1.4rem]">{{ $occupation['work_end_year'] }}
                                </p>
                            </div>
                        </div>
                        <div class="flex-1 flex justify-end items-center">
                            <div wire:click.prevent="removeApplicantOccupation({{ $idx }})"
                                class="flex items-center justify-center cursor-pointer text-[1.4rem] text-red-800 border border-sky-800 w-10 h-10 rounded-lg hover:text-red-600 hover:border-sky-600 duration-750">
                                <i class="fa-solid fa-trash-can"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4" x-transition.delay.50ms x-show.transition.duration.750ms="open"
                        style="display: none;">
                        <div class="flex gap-4">
                            <div class="flex flex-col gap-2 flex-1">
                                <x-input class="pointer-events-none bg-gray-100 text-sky-900" label="Company Name"
                                    value="{{ $occupation['company_name'] }}" />
                                <x-input class="pointer-events-none bg-gray-100 text-sky-900" label="Address"
                                    value="{{ $occupation['company_address'] }}" />
                                <x-input class="pointer-events-none bg-gray-100 text-sky-900"
                                    label="Company Phone Number" value="{{ $occupation['company_phone'] }}" />
                            </div>
                            <div class="flex flex-col gap-2 flex-1">
                                <x-input class="pointer-events-none bg-gray-100 text-sky-900" label="Latest Position"
                                    value="{{ $occupation['latest_position'] }}" />
                                <x-input class="pointer-events-none bg-gray-100 text-sky-900" label="Salary"
                                    value="{{ $occupation['salary'] }}" />
                                <x-input class="pointer-events-none bg-gray-100 text-sky-900"
                                    label="Direct Supervisor" value="{{ $occupation['direct_spv'] }}" />
                            </div>
                        </div>
                        <div>
                            <x-textarea class="pointer-events-none bg-gray-100 text-sky-900"
                                label="Reason of leaving">{{ $occupation['reason_of_leaving'] }}</x-textarea>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="flex flex-col gap-4">
                <h3 class="font-semibold text-[2rem] text-sky-900">Job Description & Organization Structure <span
                        class="block text-[1rem] text-sky-900">From the current / previous company</span></h3>
                <div class="flex gap-4">
                    <div class="flex-1">
                        <x-textarea wire:model="work_latest_jobdesc" label="Latest Jobdesc" />
                    </div>
                    <div class="flex-1">
                        <x-textarea wire:model="employeer_structure" label="Employeer Organization Structure" />
                    </div>
                </div>
            </div>

            {{-- Applicant References --}}
            <div class="flex flex-col gap-4">
                <h3 class="font-semibold text-[2rem] text-sky-900">Reference <span
                        class="block text-[1rem] text-sky-900">List of reference who know your self</span></h3>
                <div class="flex flex-col">
                    <table class="min-w-full text-left text-sm font-light overflow-x-auto" id="familyStructureTable">
                        {{-- Applicant Reference Table Head --}}
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Name</th>
                                <th scope="col" class="px-6 py-4">Relation</th>
                                <th scope="col" class="px-6 py-4">Address</th>
                                <th scope="col" class="px-6 py-4">Phone Number</th>
                                <th scope="col" class="px-6 py-4">Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Applicant Reference Table Input --}}
                            <tr
                                class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                <td class="whitespace-nowrap px-6 py-4">
                                    <x-input wire:model="reference_name" x-model="" />
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                    <x-input wire:model="reference_relation" />
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                    <x-input wire:model="reference_address" />
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                    <x-input wire:model="reference_phone_number" />
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 font-medium">
                                    <x-input wire:model="reference_remarks" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    {{-- Additional Information - Step 4 --}}
    @if ($currStep == 4)
        <div class="border-2 border-sky-800 rounded-xl p-8 flex flex-col gap-6">
            <h3 class="font-semibold text-[2rem] text-sky-900">Additional Information</h3>
            {{-- Question 1 --}}
            <div class="flex gap-2">
                <div class="flex-1 flex items-center justify-start border border-sky-900 rounded-lg p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Apakah Anda pernah melamar di
                        perusahaan ini
                        sebelumnya? Kapan dan untuk posisi apa?
                        Have you ever applied to our company before?
                        When and for what position?</p>
                </div>
                <div class="flex-1">
                    <x-textarea wire:model="question1" />
                </div>
            </div>
            {{-- Question 2 --}}
            <div class="flex gap-2">
                <div class="flex-1 flex items-center justify-start border border-sky-900 rounded-lg p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Apakah Anda terikat dengan
                        perusahaan lain saat ini?
                        Are you currently engaged in other company?</p>
                </div>
                <div class="flex-1">
                    <x-textarea wire:model="question2" />
                </div>
            </div>
            {{-- Question 3 --}}
            <div class="flex gap-2">
                <div class="flex-1 flex items-center justify-start border border-sky-900 rounded-lg p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Apakah Anda mempunyai
                        teman/saudara yang bekerja di
                        perusahaan ini? Sebutkan nama dan hubungan Anda!
                        Do you have any family or friend working in this company?
                        Please mention his/her name and your relationship with
                        him/her</p>
                </div>
                <div class="flex-1">
                    <x-textarea wire:model="question3" />
                </div>
            </div>
            {{-- Question 4 --}}
            <div class="flex gap-2">
                <div class="flex-1 flex items-center justify-start border border-sky-900 rounded-lg p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Bila diterima, bersediakah Anda
                        bertugas di luar kota?
                        Are you willing to be posted out of town?</p>
                </div>
                <div class="flex-1">
                    <x-textarea wire:model="question4" />
                </div>
            </div>
            {{-- Question 5 --}}
            <div class="flex gap-2">
                <div class="flex-1 flex items-center justify-start border border-sky-900 rounded-lg p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Jenis pekerjaan apa yang Anda
                        sukai?
                        What kind of job do you prefer?</p>
                </div>
                <div class="flex-1 flex items-center justify-start gap-2">
                    <x-select placeholder="Select one place" :options="['Kantor (Office)', 'Lapangan (Site)']" wire:model.defer="question5" />
                </div>
            </div>
            {{-- Question 6 --}}
            <div class="flex gap-2">
                <div class="flex-1 flex items-center justify-start border border-sky-900 rounded-lg p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Bila diterima, berapa gaji dan
                        fasilitas apa yang
                        diharapkan?
                        What is your expected salary and benefits?</p>
                </div>
                <div class="flex-1">
                    <x-textarea wire:model="benefits" />
                </div>
            </div>
            {{-- Question 7 --}}
            <div class="flex gap-2">
                <div class="flex-1 flex items-center justify-start border border-sky-900 rounded-lg p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Bila diterima, kapan Anda dapat
                        mulai bekerja?
                        When will you be ready to join?</p>
                </div>
                <div class="flex-1">
                    <x-textarea wire:model="ready_to_join" />
                </div>
            </div>
            {{-- Question 8 --}}
            <div class="flex gap-2">
                <div class="flex-1 flex items-center justify-start border border-sky-900 rounded-lg p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Menurut Anda apa kelebihan dan
                        kekurangan pada diri
                        Anda?
                        Sebutkan masing-masing maksimal 5 poin.
                        What are your strengths and weaknesses? Please mention
                        5 points each.</p>
                </div>
                <div class="flex-1 flex flex-col gap-2">
                    <x-textarea wire:model="strengths" label="Strengths" />
                    <x-textarea wire:model="weaknesses" label="Weaknesses" />
                </div>
            </div>
        </div>
    @endif

    @if ($currStep == 5)
        <div class="border-2 border-sky-800 rounded-xl p-8 flex flex-col gap-6">
            <h3 class="font-semibold text-[2rem] text-sky-900">Additional Information</h3>
            {{-- Question 9 --}}
            <div class="flex gap-2">
                <div class="flex-1 flex items-center justify-start border border-sky-900 rounded-lg p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Please explain what is the
                        happiest and the saddest
                        moment in your life.</p>
                </div>
                <div class="flex-1 flex flex-col gap-2">
                    <x-textarea wire:model="happiest" label="Happiest Moment" />
                    <x-textarea wire:model="saddest" label="Saddest Moment" />
                </div>
            </div>
            {{-- Question 10 --}}
            <div class="flex gap-2">
                <div class="flex-1 flex items-center justify-start border border-sky-900 rounded-lg p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Please explain your
                        achievement in
                        previous moment!</p>
                </div>
                <div class="flex-1 flex flex-col gap-2">
                    <x-input wire:model="achievement_question1" label="In what term?" />
                    <x-input wire:model="achievement_question2" label="What was your role in the achievement?" />
                    <x-textarea wire:model="achievement_question3"
                        label="What were the most important factors in the achievement? Please explain!" />
                    <x-input wire:model="achievement_question4" label="What was the barrier to success?" />
                </div>
            </div>
            {{-- Question 11 --}}
            <div class="flex gap-2">
                <div class="flex-1 flex items-center justify-start border border-sky-900 rounded-lg p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Please explain your failure in
                        previous moment!</p>
                </div>
                <div class="flex-1 flex flex-col gap-2">
                    <x-input wire:model="failure_question1" label="In what term?" />
                    <x-input wire:model="failure_question2" label="What was your role in the failure?" />
                    <x-textarea wire:model="failure_question3"
                        label="What were the most important factors in the failure and what were the solutions? Please explain" />
                </div>
            </div>
            {{-- Question 12 --}}
            <div class="flex gap-2">
                <div class="flex-1 flex items-center justify-start border border-sky-900 rounded-lg p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Ceritakan jenjang karir yang Anda
                        harapkan.
                        Please explain your career expectation.</p>
                </div>
                <div class="flex-1 flex flex-col gap-2">
                    <x-input wire:model="next_5years" label="Next 5 years" />
                    <x-input wire:model="next_10years" label="Next 10 years" />
                </div>
            </div>
            {{-- Question 13 --}}
            <div class="flex gap-2">
                <div class="flex-1 flex items-center justify-start border border-sky-900 rounded-lg p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Menurut pendapat Anda, apa saja
                        persyaratan yang harus
                        dimiliki untuk menduduki posisi yang Anda lamar
                        sekarang?
                        Please explain the qualifications for the job you apply.
                    </p>
                </div>
                <div class="flex-1 flex flex-col gap-2">
                    <x-input wire:model="technical_skills" label="Technical Skills" />
                    <x-input wire:model="attitude" label="Attitude" />
                </div>
            </div>
            {{-- Question 14 --}}
            <div class="flex gap-2">
                <div class="flex-1 flex items-center justify-start border border-sky-900 rounded-lg p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Secara singkat, siapakah Anda?
                        In short, who you are?
                    </p>
                </div>
                <div class="flex-1 flex flex-col items-center justify-center">
                    <x-select placeholder="Select one status" :options="[
                        'Tegas, ambisius, dan aktif',
                        'Ramah, sosial, dan emosional',
                        'Gigih, keras, dan sabar',
                        'Cepat, teliti, dan pasif',
                    ]" wire:model.defer="who_i_am" />
                </div>
            </div>
            {{-- Question 15 --}}
            <div class="flex gap-2">
                <div class="flex-1 flex items-center justify-start border border-sky-900 rounded-lg p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Apakah Anda pernah terlibat dalam
                        tindakan kriminal atau
                        dijatuhi hukuman oleh pengadilan karena tindakan
                        kriminal?
                        Have you been involved in any criminal activities or being
                        sentenced by the court of law for any criminal case?
                    </p>
                </div>
                <div class="flex-1 flex items-center justify-start gap-2">
                    <x-select placeholder="Select one option" :options="['No', 'Yes']" wire:model.defer="criminal_case" />
                </div>
            </div>
        </div>
    @endif

    {{-- Applicant Document - Step 6 --}}
    @if ($currStep == 6)
        <div class="border-2 border-sky-800 rounded-xl p-8 flex flex-col gap-6">
            <h3 class="font-semibold text-[2rem] text-sky-900">Application Documents</h3>
            {{-- Documents --}}
            <div class="flex justify-around items-center">
                <div class="flex flex-col gap-2">
                    <p class="text-[1.2rem] font-semibold text-sky-900">Ijazah</p>
                    <input
                        class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        wire:model="ijazah" id="file_input" type="file" />
                    @error('ijazah')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <p class="text-[1.2rem] font-semibold text-sky-900">Transkrip Nilai</p>
                    <input
                        class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        wire:model="transkrip_nilai" id="file_input" type="file" />
                    @error('transkrip_nilai')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <p class="text-[1.2rem] font-semibold text-sky-900">CV</p>
                    <input
                        class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        wire:model="cv" id="file_input" type="file" />
                    @error('cv')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <p class="text-[1.2rem] font-semibold text-sky-900">Application Letter</p>
                    <input
                        class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        wire:model="application_letter" id="file_input" type="file" />
                    @error('application_letter')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <p class="text-[1.2rem] font-semibold text-sky-900">KTP</p>
                    <input
                        class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                        wire:model="ktp" id="file_input" type="file" />
                    @error('ktp')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            {{-- Disclaimer --}}
            <div class="flex flex-col gap-4">
                <h3 class="text-sky-900 text-[1.5rem] font-semibold">PLEASE READ THIS STATEMENT CAREFULLY</h3>
                <p class="font-bold text-[1rem] text-justify text-sky-900 bg-gray-100 rounded-xl p-4">I hereby affirm
                    that the information given
                    by me on this application for employment is true, complete and accurate. I authorize a thorough
                    investigation to be made in connection with this application concerning my character, general
                    reputation, employment and educational
                    background whichever may be applicable. I understand that any falsification or omission find can be
                    considered as a sufficient cause for dismissal
                    by the company, hence I’m willing to resign from the company without any coercion from any parties.
                </p>
                <x-checkbox id="lg" label="I agree to the term and condition" lg
                    wire:model.defer="term_and_co" />
            </div>
        </div>
    @endif


    {{-- Increase & Decrease Step Button --}}
    <div class="w-full px-2 flex items-center {{ $currStep == 1 ? 'justify-end' : 'justify-between' }}">
        {{-- Previous button --}}
        @if ($currStep != 1)
            <div wire:click.prevent="decreaseStep()" onclick="scrollToTop()"
                class="border border-sky-900 rounded-xl px-4 py-3 flex justify-center items-center gap-2 cursor-pointer duration-700 hover:bg-sky-300 hover:border-sky-300 group">
                <i class="fa-solid fa-backward-step text-[2rem] duration-700 group-hover:text-white text-sky-800"></i>
                <p class="text-[1.4rem] group-hover:text-white duration-700 text-sky-800 font-semibold">Back</p>
            </div>
        @endif
        {{-- Next button --}}
        @if ($currStep != 6)
            <div wire:click.prevent="increaseStep()" onclick="scrollToTop()"
                class="group hover:bg-sky-300 hover:border-sky-300 duration-700 border border-sky-900 rounded-xl px-4 py-3 flex justify-center items-center gap-2 cursor-pointer">
                <i class="fa-solid fa-forward-step text-[2rem] group-hover:text-white duration-700 text-sky-800"></i>
                <p class="text-[1.4rem] text-sky-800 group-hover:text-white duration-700 font-semibold">Next</p>
            </div>
        @endif
        {{-- Submit button --}}
        @if ($currStep == 6)
            <div wire:click.prevent="storeApplicationForm()"
                class="group hover:bg-sky-300 hover:border-sky-300 duration-700 border border-sky-900 rounded-xl px-4 py-3 flex justify-center items-center gap-2 cursor-pointer">
                <i class="fa-solid fa-floppy-disk text-[2rem] group-hover:text-white duration-700 text-sky-800"></i>
                <p class="text-[1.4rem] text-sky-800 group-hover:text-white duration-700 font-semibold">Save</p>
            </div>
        @endif
    </div>
</div>

<script>
    // Scroll To Top function
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: "smooth", // Optional: Smooth scrolling animation
        });
    }
</script>
