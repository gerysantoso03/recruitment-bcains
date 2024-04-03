<div class="flex flex-col gap-4">

    {{-- Personal Details --}}
    @if ($currStep == 1)
        <div class="flex flex-col gap-4">
            <p class="text-3xl text-sky-900 font-bold">Personal Details</p>
            {{-- Applicant Information --}}
            <div class="flex bg-gray-50 rounded-lg p-4">
                <div class="flex-1 flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <p class="text-[1.4rem] font-semibold text-sky-900">Date of Birth</p>
                        <p class="text-[1.2rem] text-sky-950">
                            {{ Carbon\Carbon::parse($applicantDetail['birth_date'])->toFormattedDateString() }}</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="text-[1.4rem] font-semibold text-sky-900">Gender</p>
                        <p class="text-[1.2rem] text-sky-950">{{ $applicantDetail['gender'] }}</p>
                    </div>
                </div>
                <div class="flex-1 flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <p class="text-[1.4rem] font-semibold text-sky-900">Place Of Birth</p>
                        <p class="text-[1.2rem] text-sky-950">{{ $applicantDetail['birth_place'] }}</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="text-[1.4rem] font-semibold text-sky-900">Religion</p>
                        <p class="text-[1.2rem] text-sky-950">{{ $applicantDetail['religion'] }}</p>
                    </div>
                </div>
            </div>
            {{-- Applicant Information --}}
            <div class="flex bg-gray-50 rounded-lg p-4">
                <div class="flex-1 flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <p class="text-[1.4rem] font-semibold text-sky-900">Phone Number</p>
                        <p class="text-[1.2rem] text-sky-950">{{ $applicantPhones['cell_phone'] }}</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="text-[1.4rem] font-semibold text-sky-900">Home Telephone</p>
                        <p class="text-[1.2rem] text-sky-950">
                            {{ $applicantPhones['home_phone'] ? $applicantPhones['home_phone'] : '-' }}</p>
                    </div>
                </div>
                <div class="flex-1 flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <p class="text-[1.4rem] font-semibold text-sky-900">Parent Telephone</p>
                        <p class="text-[1.2rem] text-sky-950">{{ $applicantPhones['parent_phone'] }}</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="text-[1.4rem] font-semibold text-sky-900">Office Telephone</p>
                        <p class="text-[1.2rem] text-sky-950">
                            {{ $applicantPhones['office_phone'] ? $applicantPhones['office_phone'] : '-' }}
                        </p>
                    </div>
                </div>
            </div>
            {{-- Applicant Information --}}
            <div class="flex bg-gray-50 rounded-lg p-4">
                <div class="flex-1 flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <p class="text-[1.4rem] font-semibold text-sky-900">Marital Status</p>
                        <p class="text-[1.2rem] text-sky-950">{{ $applicantDetail['marital_status'] }}</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="text-[1.4rem] font-semibold text-sky-900">Blood Type</p>
                        <p class="text-[1.2rem] text-sky-950">{{ $applicantDetail['blood_type'] }}</p>
                    </div>
                </div>
                <div class="flex-1 flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <p class="text-[1.4rem] font-semibold text-sky-900">Height</p>
                        <p class="text-[1.2rem] text-sky-950">{{ $applicantDetail['height'] }} cm</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="text-[1.4rem] font-semibold text-sky-900">Weight</p>
                        <p class="text-[1.2rem] text-sky-950">{{ $applicantDetail['weight'] }} kg</p>
                    </div>
                </div>
            </div>
            {{-- Applicant Family --}}
            <div class="flex flex-col gap-4">
                <p class="text-3xl text-sky-900 font-bold">Families</p>
                <div class="overflow-x-auto bg-gray-100 rounded-lg">
                    <table class="min-w-full text-left text-sm font-light" id="familyStructureTable">
                        {{-- Applicant Families History Table Head --}}
                        <thead class="border-b dark:border-neutral-500 text-[1rem] text-sky-900">
                            <tr>
                                <th scope="col" class="px-6 py-4">Relation</th>
                                <th scope="col" class="px-6 py-4">Name</th>
                                <th scope="col" class="px-6 py-4">Gender</th>
                                <th scope="col" class="px-6 py-4">Age</th>
                                <th scope="col" class="px-6 py-4">Education</th>
                                <th scope="col" class="px-6 py-4">Occupation</th>
                                <th scope="col" class="px-6 py-4">Employeers Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Applicant Families History Table Content --}}
                            @foreach ($applicantFamilies as $idx => $family)
                                <tr
                                    class="border-b text-[1.1rem] transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <p>{{ $family['relation'] }}</p>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <p>{{ $family['family_name'] }}</p>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <p>{{ $family['gender'] }}</p>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <p>{{ $family['age'] }}</p>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <p>{{ $family['last_education'] }}</p>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <p>{{ $family['occupation'] }}</p>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <p>{{ $family['employeer_name'] }}</p>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> {{-- End of applicant Families history table --}}
            </div>
        </div>
    @elseif ($currStep == 2)
        {{-- Applicant Medical & Education & Skills --}}
        <div class="flex flex-col gap-4">
            {{-- Applicant medical history section --}}
            <div class="flex flex-col gap-2">
                <h3 class="text-[2rem] text-sky-900 font-semibold">Medical History</h3>
                @if ($applicantMedicalHistories)
                    <div class="border border-sky-900 p-4 rounded-lg">
                        <p class="font-semibold text-[1.5rem] text-sky-900">Serious illness / serious accident?</p>
                        {{-- Applicant Illness Table --}}
                        <div class="flex flex-col mb-4">
                            <table class="min-w-full text-left text-sm font-light overflow-x-auto"
                                id="familyStructureTable">
                                {{-- Applicant Medical History Table Head --}}
                                <thead class="border-b dark:border-neutral-500 text-[1rem] text-sky-900">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">Illness Date</th>
                                        <th scope="col" class="px-6 py-4">Disease / Illness</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Applicant Medical History Table Input --}}
                                    @foreach (json_decode($Illness, true) as $idx => $ill)
                                        <tr
                                            class="border-b text-[1rem] transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                            <td class="whitespace-nowrap px-6 py-4 w-[29%]">
                                                <p>{{ $ill['illness_date'] }}</p>
                                            </td>
                                            <td class="whitespace-nowrap px-6 py-4">
                                                <p>{{ $ill['illness_name'] }}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> {{-- End of applicant illness table --}}
                        {{-- Applicant Illness impact --}}
                        <div class="flex gap-4">
                            <div class="flex flex-[1.5] flex-col gap-2">
                                <p class="font-semibold text-[1.5rem] text-sky-900">Current impacts?</p>
                                <p class="text-[1rem] text-sky-900">{{ $applicantMedicalHistories['illness_impact'] }}
                                </p>
                            </div>
                            <div class="flex flex-col gap-2 flex-[1]">
                                <p class="font-semibold text-[1.5rem] text-sky-900">History of
                                    diseases?</p>
                                <div class="flex flex-col gap-4">
                                    <x-checkbox md class="pointer-events-none" :checked="$illnessRemarks['is_tbc']" label="TBC" />
                                    <x-checkbox md class="pointer-events-none" :checked="$illnessRemarks['is_hiv']" label="HIV/AIDS" />
                                    <div class="flex justify-center items-center gap-8">
                                        <x-checkbox md class="pointer-events-none" :checked="$illnessRemarks['is_others']" label="Others" />
                                        <x-input value="{{ $illnessRemarks['other_illness'] }}" readonly />
                                    </div>
                                </div>
                            </div>
                        </div> {{-- End fo applicant illness impact --}}
                    </div>
                @else
                    <p class="italic text-[1.2rem] text-sky-900">*Applicant doesn't have medical history</p>
                @endif
            </div> {{-- End of applicant medical section --}}

            {{-- Applicant Educational Background Section --}}
            <div class="flex flex-col gap-2">
                <h3 class="text-[2rem] text-sky-900 font-semibold">Educational Background</h3>
                <div class="border border-sky-900 p-4 rounded-lg">
                    {{-- Applicant Education histories Table --}}
                    <div class="flex flex-col">
                        <table class="min-w-full text-left text-sm font-light overflow-x-auto"
                            id="familyStructureTable">
                            {{-- Applicant Educational History Table Head --}}
                            <thead class="border-b text-[1rem] text-sky-900 dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">Education</th>
                                    <th scope="col" class="px-6 py-4">Name</th>
                                    <th scope="col" class="px-6 py-4">Major / Subject</th>
                                    <th scope="col" class="px-6 py-4">Start Year</th>
                                    <th scope="col" class="px-6 py-4">End Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Applicant Educational History Table Content --}}
                                @foreach ($applicantEducations as $idx => $education)
                                    <tr
                                        class="border-b text-[1rem] transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <p>{{ $education['education_category'] }}</p>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <p>{{ $education['education_name'] }}</p>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <p>{{ $education['education_subject'] }}</p>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <p>{{ $education['start_year'] }}</p>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <p>{{ $education['end_year'] }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> {{-- End of applicant educational history table --}}
                </div>
            </div>

            {{-- Applicant Skills Section --}}
            <div class="flex flex-col gap-2">
                <h3 class="text-[2rem] text-sky-900 font-semibold">Skills & Organization</h3>
                @if ($languageSkill || $compSkill || $applicantOrg)
                    @if ($languageSkill)
                        <h4 class="text-[1.2rem] text-sky-900 font-semibold">Languages</h4>
                        <div class="border border-sky-900 p-4 rounded-lg">
                            {{-- Applicant language skill Table --}}
                            <div class="flex flex-col">
                                <table class="min-w-full text-left text-sm font-light overflow-x-auto"
                                    id="familyStructureTable">
                                    {{-- Applicant language History Table Head --}}
                                    <thead class="border-b text-[1rem] text-sky-900 dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">Language</th>
                                            <th scope="col" class="px-6 py-4">Level</th>
                                            <th scope="col" class="px-6 py-4">Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Applicant language History Table Content --}}
                                        @foreach ($languageSkill as $idx => $language)
                                            <tr
                                                class="border-b text-[1rem] transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <p>{{ $language['language'] }}</p>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <p>{{ $language['language_level'] }}</p>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <p>{{ $language['language_remark'] }}</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> {{-- End of applicant language history table --}}
                        </div>
                    @endif
                    @if ($compSkill)
                        <h4 class="text-[1.2rem] text-sky-900 font-semibold">Computers</h4>
                        <div class="border border-sky-900 p-4 rounded-lg">
                            {{-- Applicant computer skill Table --}}
                            <div class="flex flex-col">
                                <table class="min-w-full text-left text-sm font-light overflow-x-auto"
                                    id="familyStructureTable">
                                    {{-- Applicant computer History Table Head --}}
                                    <thead class="border-b text-[1rem] text-sky-900 dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">Computer</th>
                                            <th scope="col" class="px-6 py-4">Level</th>
                                            <th scope="col" class="px-6 py-4">Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Applicant computer History Table Content --}}
                                        @foreach ($compSkill as $idx => $comp)
                                            <tr
                                                class="border-b text-[1rem] transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <p>{{ $comp['computer'] }}</p>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <p>{{ $comp['comp_level'] }}</p>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <p>{{ $comp['comp_remark'] }}</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> {{-- End of applicant computer history table --}}
                        </div>
                    @endif
                    @if ($applicantOrg)
                        <h4 class="text-[1.2rem] text-sky-900 font-semibold">Organizations</h4>
                        <div class="border border-sky-900 p-4 rounded-lg">
                            {{-- Applicant organization skill Table --}}
                            <div class="flex flex-col">
                                <table class="min-w-full text-left text-sm font-light overflow-x-auto"
                                    id="familyStructureTable">
                                    {{-- Applicant organization History Table Head --}}
                                    <thead class="border-b text-[1rem] text-sky-900 dark:border-neutral-500">
                                        <tr>
                                            <th scope="col" class="px-6 py-4">Organization</th>
                                            <th scope="col" class="px-6 py-4">Position</th>
                                            <th scope="col" class="px-6 py-4">Event</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- Applicant organization History Table Content --}}
                                        @foreach ($applicantOrg as $idx => $org)
                                            <tr
                                                class="border-b text-[1rem] transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <p>{{ $org['org_experience'] }}</p>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <p>{{ $org['org_position'] }}</p>
                                                </td>
                                                <td class="whitespace-nowrap px-6 py-4">
                                                    <p>{{ $org['org_event'] }}</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> {{-- End of applicant organization history table --}}
                        </div>
                        <div class="flex gap-4 mt-4">
                            <div class="flex-1 flex flex-col gap-2">
                                <p class="text-sky-900 text-[1.2rem] font-semibold">Organization Jobdesc</p>
                                <p class="text-[1rem] text-sky-900 text-justify">{{ $org_jobdesc }}</p>
                            </div>
                            <div class="flex-1 flex flex-col gap-2">
                                <p class="text-sky-900 text-[1.2rem] font-semibold">Organization Structure</p>
                                <p class="text-[1rem] text-sky-900 text-justify">{{ $org_structure }}</p>
                            </div>
                        </div>
                    @endif
                @else
                    <p class="italic text-[1.2rem] text-sky-900">*Applicant doesn't have any skills or organization
                        experience</p>
                @endif
            </div>
        </div>
    @elseif ($currStep == 3)
        {{-- Applicant Employment histories --}}
        <div class="flex flex-col gap-4">
            {{-- Applicant employment histories section --}}
            <h3 class="text-[2rem] text-sky-900 font-semibold">Employment History</h3>
            @if ($occupations)
                @foreach ($occupations as $idx => $occupation)
                    <div class="flex flex-col gap-4 border border-sky-900 rounded-xl p-4" x-data="{ open: false }">
                        <div class="flex items-center justify-between cursor-pointer" @click="open = !open">
                            <div class="flex-1 flex flex-col">
                                <p class="text-[1.8rem] text-sky-900 font-semibold">
                                    {{ $occupation['latest_position'] }}
                                </p>
                                <div class="flex justify-start items-center gap-2">
                                    <p class="font-semibold text-sky-900 text-[1.4rem]">
                                        {{ $occupation['work_start_year'] }}</p>
                                    <i class="fa-solid fa-minus"></i>
                                    <p class="font-semibold text-sky-900 text-[1.4rem]">
                                        {{ $occupation['work_end_year'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4" x-transition.delay.50ms
                            x-show.transition.duration.750ms="open" style="display: none;">
                            <div class="flex gap-4">
                                <div class="flex flex-col gap-2 flex-1">
                                    <x-input class="bg-gray-100 text-sky-900" readonly label="Company Name"
                                        value="{{ $occupation['company_name'] }}" />
                                    <x-input class="bg-gray-100 text-sky-900" readonly label="Address"
                                        value="{{ $occupation['company_address'] }}" />
                                    <x-input class="bg-gray-100 text-sky-900" readonly label="Company Phone Number"
                                        value="{{ $occupation['company_phone'] }}" />
                                </div>
                                <div class="flex flex-col gap-2 flex-1">
                                    <x-input class="bg-gray-100 text-sky-900" readonly label="Latest Position"
                                        value="{{ $occupation['latest_position'] }}" />
                                    <x-input class="bg-gray-100 text-sky-900" readonly label="Salary"
                                        value="{{ $occupation['salary'] }}" />
                                    <x-input class="bg-gray-100 text-sky-900" readonly label="Direct Supervisor"
                                        value="{{ $occupation['direct_spv'] }}" />
                                </div>
                            </div>
                            <div>
                                <x-textarea readonly class="bg-gray-100 text-sky-900"
                                    label="Reason of leaving">{{ $occupation['reason_of_leaving'] }}</x-textarea>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="flex gap-4 mt-4">
                    <div class="flex-1 flex flex-col gap-2">
                        <p class="mb-2 text-sky-900 text-[1.2rem] font-semibold">Latest Jobdesc</p>
                        <p class="text-[1rem] text-sky-900">{{ $work_jobdesc }}</p>
                    </div>
                    <div class="flex-1 flex flex-col gap-2">
                        <p class="mb-2 text-sky-900 text-[1.2rem] font-semibold">Employeer Structure</p>
                        <p class="text-[1rem] text-sky-900">{{ $work_structure }}</p>
                    </div>
                </div>
            @else
                <p class="italic text-[1.2rem] text-sky-900">*Applicant doesn't have employment history</p>
            @endif
            {{-- Applicant References --}}
            <div class="flex flex-col gap-4">
                <h3 class="font-semibold text-[2rem] text-sky-900">Reference</h3>
                @if (count($applicantReference) > 0)
                    <div class="flex flex-col">
                        <table class="min-w-full text-left text-sm font-light overflow-x-auto"
                            id="familyStructureTable">
                            {{-- Applicant Reference Table Head --}}
                            <thead class="border-b text-[1rem] text-sky-900 dark:border-neutral-500">
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
                                    class="border-b text-[1rem] transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <p>{{ $applicantReference[0]['reference_name'] }}</p>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <p>{{ $applicantReference[0]['reference_relation'] }}</p>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <p>{{ $applicantReference[0]['reference_address'] }}</p>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <p>{{ $applicantReference[0]['phone_number'] }}</p>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <p>{{ $applicantReference[0]['remarks'] }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="italic text-[1.2rem] text-sky-900">*Applicant doesn't have any reference</p>
                @endif
            </div>
        </div>
    @elseif ($currStep == 4)
        <div class="flex flex-col gap-8">
            {{-- Question 1 --}}
            <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-1 flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">
                        Have you ever applied to our company before?
                        When and for what position?</p>
                </div>
                <div class="flex-1 p-2">
                    <p class="text-sky-900 text-[1.2rem]">{{ $additionalInfo['question1'] }}</p>
                </div>
            </div>
            {{-- Question 2 --}}
            <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-1 flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">
                        Are you currently engaged in other company?</p>
                </div>
                <div class="flex-1 p-2">
                    <p class="text-sky-900 text-[1.2rem]">{{ $additionalInfo['question2'] }}</p>
                </div>
            </div>
            {{-- Question 3 --}}
            <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-1 flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify"> Do you have any family or
                        friend
                        working in this company?
                        Please mention his/her name and your relationship with
                        him/her</p>
                </div>
                <div class="flex-1 p-2">
                    <p class="text-sky-900 text-[1.2rem]">{{ $additionalInfo['question3'] }}</p>
                </div>
            </div>
            {{-- Question 4 --}}
            <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-1 flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Are you willing to be posted
                        out
                        of town?</p>
                </div>
                <div class="flex-1 p-2">
                    <p class="text-sky-900 text-[1.2rem]">{{ $additionalInfo['question4'] }}</p>
                </div>
            </div>
            {{-- Question 5 --}}
            <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-1 flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify"> What kind of job do you
                        prefer?
                    </p>
                </div>
                <div class="flex-1 p-2">
                    <p class="text-sky-900 text-[1.2rem]">{{ $additionalInfo['question5'] }}</p>
                </div>
            </div>
            {{-- Question 6 --}}
            <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-1 flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify"> What is your expected salary
                        and
                        benefits?
                    </p>
                </div>
                <div class="flex-1 p-2">
                    <p class="text-sky-900 text-[1.2rem]">{{ $additionalInfo['benefits'] }}</p>
                </div>
            </div>
            {{-- Question 7 --}}
            <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-1 flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify"> When will you be ready to
                        join?
                    </p>
                </div>
                <div class="flex-1 p-2">
                    <p class="text-sky-900 text-[1.2rem]">{{ $additionalInfo['ready_to_join'] }}</p>
                </div>
            </div>
            {{-- Question 8 --}}
            <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-1 flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">What are your strengths?
                    </p>
                </div>
                <div class="flex-1 p-2">
                    <p class="text-sky-900 text-[1.2rem]">{{ $additionalInfo['strengths'] }}</p>
                </div>
            </div>
            <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-1 flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">What are your weaknesses?
                    </p>
                </div>
                <div class="flex-1 p-2">
                    <p class="text-sky-900 text-[1.2rem]">{{ $additionalInfo['weaknesses'] }}</p>
                </div>
            </div>
            <div class="flex items-center justify-end">
                <div wire:click.prevent="setStep(5)" onclick="scrollToTop()"
                    class="group hover:bg-sky-300 hover:border-sky-300 duration-700 border border-sky-900 rounded-xl px-4 py-3 flex justify-center items-center gap-2 cursor-pointer">
                    <i
                        class="fa-solid fa-forward-step text-[2rem] group-hover:text-white duration-700 text-sky-800"></i>
                    <p class="text-[1.4rem] text-sky-800 group-hover:text-white duration-700 font-semibold">Next
                    </p>
                </div>
            </div>
        </div>
    @elseif ($currStep == 5)
        <div class="flex flex-col gap-8">
            {{-- Question 9 --}}
            <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-1 flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Happiest moment in your life.
                    </p>
                </div>
                <div class="flex-1 p-2">
                    <p class="text-sky-900 text-[1.2rem]">{{ $additionalInfo['happiest'] }}</p>
                </div>
            </div>
            <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-1 flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Saddest moment in your life.
                    </p>
                </div>
                <div class="flex-1 p-2">
                    <p class="text-sky-900 text-[1.2rem]">{{ $additionalInfo['saddest'] }}</p>
                </div>
            </div>
            {{-- Question 10 --}}
            <div class="flex bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-[1] flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Please explain your
                        achievement in
                        previous moment!
                    </p>
                </div>
                <div class="flex-[2] flex flex-col gap-2 p-2">
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-sky-900 text-[1.2rem]">In What Terms?</p>
                        <p class="text-sky-900 text-[1rem]">{{ $additionalInfo['achievement_question1'] }}
                        </p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-sky-900 text-[1.2rem]">What was your role in the achievement?</p>
                        <p class="text-sky-900 text-[1rem]">{{ $additionalInfo['achievement_question2'] }}
                        </p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-sky-900 text-[1.2rem]">What were the most important factors in the
                            achievement? Please explain!</p>
                        <p class="text-sky-900 text-[1rem]">{{ $additionalInfo['achievement_question3'] }}
                        </p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-sky-900 text-[1.2rem]">What was the barrier to success?</p>
                        <p class="text-sky-900 text-[1rem]">{{ $additionalInfo['achievement_question4'] }}
                        </p>
                    </div>
                </div>
            </div>
            {{-- Question 11 --}}
            <div class="flex bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-[1] flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Please explain your
                        failure in
                        previous moment!
                    </p>
                </div>
                <div class="flex-[2] flex flex-col gap-2 p-2">
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-sky-900 text-[1.2rem]">In What Terms?</p>
                        <p class="text-sky-900 text-[1rem]">{{ $additionalInfo['failure_question1'] }}
                        </p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-sky-900 text-[1.2rem]">What was your role in the failure?</p>
                        <p class="text-sky-900 text-[1rem]">{{ $additionalInfo['failure_question2'] }}
                        </p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-sky-900 text-[1.2rem]">What were the most important factors in the
                            failure and what were the solutions? Please explain</p>
                        <p class="text-sky-900 text-[1rem]">{{ $additionalInfo['failure_question3'] }}
                        </p>
                    </div>
                </div>
            </div>
            {{-- Question 12 --}}
            <div class="flex bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-[1] flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify">Please explain your
                        career expectation!
                    </p>
                </div>
                <div class="flex-[2] flex flex-col gap-2 p-2">
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-sky-900 text-[1.2rem]">Next 5 Years</p>
                        <p class="text-sky-900 text-[1rem]">{{ $additionalInfo['next_5years'] }}
                        </p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-sky-900 text-[1.2rem]">Next 10 Years</p>
                        <p class="text-sky-900 text-[1rem]">{{ $additionalInfo['next_10years'] }}
                        </p>
                    </div>
                </div>
            </div>
            {{-- Question 13 --}}
            <div class="flex bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-[1] flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify"> Please explain the qualifications
                        for the job you apply.
                    </p>
                </div>
                <div class="flex-[2] flex flex-col gap-2 p-2">
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-sky-900 text-[1.2rem]">Technical Skills</p>
                        <p class="text-sky-900 text-[1rem]">{{ $additionalInfo['technical_skills'] }}
                        </p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="font-semibold text-sky-900 text-[1.2rem]">Attitude</p>
                        <p class="text-sky-900 text-[1rem]">{{ $additionalInfo['attitude'] }}
                        </p>
                    </div>
                </div>
            </div>
            {{-- Question 14 --}}
            <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-1 flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify"> In short, who you are?
                    </p>
                </div>
                <div class="flex-1 p-2">
                    <p class="text-sky-900 text-[1.2rem]">{{ $additionalInfo['who_i_am'] }}</p>
                </div>
            </div>
            {{-- Question 14 --}}
            <div class="flex flex-col bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex-1 flex items-center justify-start bg-gray-100 p-2">
                    <p class="text-sky-900 text-[1.2rem] font-semibold text-justify"> Have you been involved in any
                        criminal activities or being
                        sentenced by the court of law for any criminal case?
                    </p>
                </div>
                <div class="flex-1 p-2">
                    <p class="text-sky-900 text-[1.2rem]">{{ $additionalInfo['criminal_case'] }}</p>
                </div>
            </div>
            <div class="flex items-center justify-start">
                <div wire:click.prevent="setStep(4)" onclick="scrollToTop()"
                    class="border border-sky-900 rounded-xl px-4 py-3 flex justify-center items-center gap-2 cursor-pointer duration-700 hover:bg-sky-300 hover:border-sky-300 group">
                    <i
                        class="fa-solid fa-backward-step text-[2rem] duration-700 group-hover:text-white text-sky-800"></i>
                    <p class="text-[1.4rem] group-hover:text-white duration-700 text-sky-800 font-semibold">Back
                    </p>
                </div>
            </div>
        </div>
    @else
        <div class="flex flex-col gap-4">
            {{-- Documents Header --}}
            <div class="border-b px-4 flex gap-2 justify-around items-center">
                {{-- Items Header --}}
                <div wire:click="setDocStep(1)"
                    class="cursor-pointer {{ $docStep == 1 ? 'border-b-2 border-sky-800' : '' }} duration-100 p-2 flex items-center justify-center h-full">
                    <p class="text-[1.2rem] text-center font-semibold text-sky-900">Ijazah / Bukti Kelulusan</p>
                </div>
                {{-- Items Header --}}
                <div wire:click="setDocStep(2)"
                    class="cursor-pointer {{ $docStep == 2 ? 'border-b-2 border-sky-800' : '' }} duration-100 p-2 flex items-center justify-center h-full">
                    <p class="text-[1.2rem] text-center font-semibold text-sky-900">Transkrip Nilai</p>
                </div>
                {{-- Items Header --}}
                <div wire:click="setDocStep(3)"
                    class="cursor-pointer {{ $docStep == 3 ? 'border-b-2 border-sky-800' : '' }} duration-100 p-2 flex items-center justify-center h-full">
                    <p class="text-[1.2rem] text-center font-semibold text-sky-900">CV</p>
                </div>
                {{-- Items Header --}}
                <div wire:click="setDocStep(4)"
                    class="cursor-pointer {{ $docStep == 4 ? 'border-b-2 border-sky-800' : '' }} duration-100 p-4 flex items-center justify-center h-full">
                    <p class="text-[1.2rem] text-center font-semibold text-sky-900">Application Letter</p>
                </div>
                {{-- Items Header --}}
                <div wire:click="setDocStep(5)"
                    class="cursor-pointer {{ $docStep == 5 ? 'border-b-2 border-sky-800' : '' }} duration-100 p-2 flex items-center justify-center h-full">
                    <p class="text-[1.2rem] text-center font-semibold text-sky-900">KTP</p>
                </div>
            </div>
            @if ($docStep == 1)
                <embed src="{{ asset($applicantDocuments['ijazah']) }}" type="application/pdf" width="100%"
                    height="650px">
            @elseif ($docStep == 2)
                <embed src="{{ asset($applicantDocuments['transkrip_nilai']) }}" type="application/pdf"
                    width="100%" height="650px">
            @elseif ($docStep == 3)
                <embed src="{{ asset($applicantDocuments['cv']) }}" type="application/pdf" width="100%"
                    height="650px">
            @elseif ($docStep == 4)
                <embed src="{{ asset($applicantDocuments['application_letter']) }}" type="application/pdf"
                    width="100%" height="650px">
            @elseif ($docStep == 5)
                <embed src="{{ asset($applicantDocuments['ktp']) }}" type="application/pdf" width="100%"
                    height="650px">
            @endif
        </div>
    @endif

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
