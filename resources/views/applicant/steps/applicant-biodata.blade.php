{{-- General Information Form --}}
<div class="border-2 border-sky-800 rounded-xl p-8 flex flex-col gap-8">
    {{-- General Info - First Section --}}
    <div class="flex gap-4">
        {{-- General Info - First Section - First Wrapper --}}
        <div class="flex flex-[1.5] flex-col gap-4">
            <x-input wire:model="state.fullname" label="Fullname" corner-hint="Ex: Gery Santoso" />
            <x-input wire:model="state.email" label="Email" corner-hint="Ex: gery@yahoo.com" />
            <x-input wire:model="state.address" label="Address"
                corner-hint="Ex: Jl. Kaliurang No.20, Kebayoran, Jakarta" />
            <x-input wire:model="state.job_id" label="Position Applied" />
            <x-input wire:model="state.info_of_job" label="Information of Job"
                corner-hint="Ex: Linkedin, Instagram, Job Street" />
        </div>
        {{-- General Info - First Section - Applicant Photo --}}
        <div class="flex flex-col gap-4 flex-1 justify-around items-center">
            {{-- Applicant Photo Preview --}}
            <div class="border border-sky-950 overflow-hidden rounded-lg w-60 h-72 flex items-center justify-center"
                wire:ignore>
                <img id="previewApplicant" src="" alt="applicant photo" style="display:none;"
                    class="object-cover" />
            </div>
            <input
                class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                wire:model="state.applicant_photo" id="file_input" type="file">
        </div>
    </div>
    {{-- General Info - Second Section --}}
    <div class="flex gap-4">
        {{-- General Info - Second Section - First Wrapper --}}
        <div class="flex flex-col flex-1 gap-4">
            <x-datetime-picker label="Birth Date" placeholder="Birth Date" wire:model="state.birth_date" without-time />
            <x-input wire:model="state.birth_place" label="Birth Place" corner-hint="Ex: Jakarta, Bali" />
            <x-input label="Home Telephone" corner-hint="Ex: 02189430233" />
            <x-input label="Cellphone" corner-hint="Ex: 087888392032" />
        </div>
        {{-- General Info - Second Section - Second Wrapper --}}
        <div class="flex flex-col flex-1 gap-4">
            <x-select label="Religion" wire:model="state.religion" placeholder="Select one religion"
                :options="['Katolik', 'Kristen Protestan', 'Islam', 'Hindu', 'Budha', 'Konghucu']" />
            <x-select label="Gender" wire:model="state.gender" placeholder="Select one gender" :options="['Male', 'Female', 'Others']" />
            <x-input label="Office Telephone" corner-hint="Ex: 02189430233" />
            <x-input label="Parent's Telephone" corner-hint="Ex: 087888392032" />
        </div>
    </div>
    {{-- General Info - Third Section --}}
    <div class="flex gap-4">
        {{-- General Info - Third Section - First Wrapper --}}
        <div class="flex flex-col flex-1 gap-4">
            <x-select label="Marital Status" wire:model="state.marital_status" placeholder="Select one status"
                :options="['Single', 'Married']" />
            <x-select label="Blood Type" wire:model="state.blood_type" placeholder="Select one type"
                :options="['O', 'A', 'B', 'AB']" />
            <x-inputs.number wire:model="state.height" placeholder="0" label="Height" />
            <x-inputs.number wire:model="state.weight" label="Weight" placeholder="0" />
        </div>
        {{-- General Info - Third Section - Second Wrapper --}}
        <div class="flex flex-col flex-1 gap-4">
            <x-input wire:model="state.ktp_number" label="No. KTP" corner-hint="Must be in 16 digit number" />
            <x-input wire:model="state.hobby" label="Hobby" corner-hint="Ex: Soccer, Cycling, Boxing" />
            <x-input label="Instagram" corner-hint="Ex: santi20" />
            <x-input label="Tiktok/Others" corner-hint="Ex: SantiTiktokers" />
        </div>
    </div>
    {{-- Family Structure Form --}}
    <div class="flex flex-col gap-4 ">
        <h3 class="font-semibold text-[2rem] text-sky-900">Family Structure</h3>
        {{-- Family Structure Table --}}
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light" id="familyStructureTable">
                            {{-- Family Structure Table Head --}}
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
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
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                                        <x-input id="familyStructureName" wire:model="firstName" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <x-select placeholder="Select gender" :options="['Male', 'Female']"
                                            wire:model.defer="model" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <x-inputs.number placeholder="0" wire:model="firstName" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <x-input wire:model="firstName" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <x-input wire:model="firstName" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <x-input wire:model="firstName" />
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div id="addNewFamilyStructure"
                                            class="flex items-center justify-center cursor-pointer text-[1.4rem] text-sky-800 border border-sky-800 w-10 h-10 rounded-lg hover:text-sky-600 hover:border-sky-600 duration-750">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                    </td>
                                </tr>
                                {{-- Family Structure Table Content --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Preview Applicant Photo
    inputImage = document.getElementById('file_input')
    preview = document.getElementById('previewApplicant');
    inputImage.onchange = evt => {
        preview.style.display = 'block';
        const [file] = inputImage.files
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    // Add Multiple Input for Applicant Families
    let i = 0;
    $("#addNewFamilyStructure").click(function() {
        // Get input value
        let familyName = $('#familyStructureName').val();
        // ++i;
        $("#familyStructureTable").append(
            "<tr class='border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600'><td class='whitespace-nowrap px-6 py-4'>" +
            familyName +
            "</td><td class='whitespace-nowrap px-6 py-4'></td><td class='whitespace-nowrap px-6 py-4'></td><td class='whitespace-nowrap px-6 py-4'></td><td class='whitespace-nowrap px-6 py-4'></td><td class='whitespace-nowrap px-6 py-4'></td><td class='whitespace-nowrap px-6 py-4'></td></tr> "
        );
    });
    // $(document).on('click', '.remove-input-field', function() {
    //     $(this).parents('tr').remove();
    // });
</script>
