<div class="p-4 min-w-[120rem] max-w-[120rem] flex justify-around items-center">
    {{-- First Step --}}
    <div class="flex flex-col items-center justify-center gap-2">
        <div
            class="w-[4rem] h-[4rem] rounded-full flex justify-center items-center @if ($currStep == 1) bg-sky-300 @endif">
            <i class="fa-solid fa-user text-[2rem] @if ($currStep == 1) text-white @endif"></i>
        </div>
        <p class="text-[1.2rem] font-semibold @if ($currStep == 1) text-sky-300 @else text-sky-900 @endif">
            Applicant Biodata</p>
    </div>
    {{-- Second Step --}}
    <div class="flex flex-col items-center justify-center gap-2">
        <div
            class="w-[4rem] h-[4rem] rounded-full flex justify-center items-center @if ($currStep == 2) bg-sky-300 @endif">
            <i class="fa-solid fa-notes-medical text-[2rem] @if ($currStep == 2) text-white @endif"></i>
        </div>
        <p
            class="text-[1.2rem] font-semibold text-center @if ($currStep == 2) text-sky-300 @else text-sky-900 @endif">
            Medical, Education & Skills
        </p>
    </div>
    {{-- Third Step --}}
    <div class="flex flex-col items-center justify-center gap-2">
        <div
            class="w-[4rem] h-[4rem] rounded-full flex justify-center items-center @if ($currStep == 3) bg-sky-300 @endif">
            <i class="fa-solid fa-users text-[2rem] @if ($currStep == 3) text-white @endif"></i>
        </div>
        <p
            class="text-[1.2rem] font-semibold text-center @if ($currStep == 3) text-sky-300 @else text-sky-900 @endif">
            Employment Histories & Reference
        </p>
    </div>
    {{-- Fourth & Fifth Step --}}
    <div class="flex flex-col items-center justify-center gap-2">
        <div
            class="w-[4rem] h-[4rem] rounded-full flex justify-center items-center @if ($currStep == 4 || $currStep == 5) bg-sky-300 @endif">
            <i class="fa-solid fa-clipboard text-[2rem] @if ($currStep == 4 || $currStep == 5) text-white @endif"></i>
        </div>
        <p
            class="text-[1.2rem] font-semibold text-center @if ($currStep == 4 || $currStep == 5) text-sky-300 @else text-sky-900 @endif">
            Additional Information
        </p>
    </div>
    {{-- Sixth Step --}}
    <div class="flex flex-col items-center justify-center gap-2">
        <div
            class="w-[4rem] h-[4rem] rounded-full flex justify-center items-center @if ($currStep == 6) bg-sky-300 @endif">
            <i class="fa-solid fa-folder-open text-[2rem] @if ($currStep == 6) text-white @endif"></i>
        </div>
        <p
            class="text-[1.2rem] font-semibold text-center @if ($currStep == 6) text-sky-300 @else text-sky-900 @endif">
            Applicant Documents
        </p>
    </div>
</div>
