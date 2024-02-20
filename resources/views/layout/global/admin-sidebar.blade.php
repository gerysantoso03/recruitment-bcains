<aside class="flex flex-col">
    {{-- BCAinsurance Logo --}}
    <div class="flex justify-center items-center w-[25rem]">
        <img src="{{ asset('images/BCA-insurance.png') }}" alt="">
    </div>
    {{-- Sidebar Navigation --}}
    <div class="flex flex-col">
        <a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard') ? 'text-white bg-sky-900' : 'text-sky-950' }} px-4 py-6 flex gap-2 font-semibold text-[1.5rem] shadow-gray-500 shadow-[0_1px_0_0]">
            <i class="fa-solid fa-gauge-high text-[1.8rem]"></i> Dashboard
        </a>
        <a href="{{ route('job') }}" class="{{ Route::is('job') ? 'text-white bg-sky-800' : 'text-sky-950' }} px-4 py-6 flex gap-2 font-semibold text-[1.5rem] shadow-gray-500 shadow-[0_1px_0_0]">
            <i class="fa-solid fa-door-open text-[1.8rem]"></i> Jobs
        </a>
        <a href="{{ route('applicant') }}" class="{{ Route::is('applicant') ? 'text-white bg-sky-800' : 'text-sky-950' }} px-4 py-6 flex gap-2 font-semibold text-[1.5rem] shadow-gray-500 shadow-[0_1px_0_0]">
            <i class="fa-solid fa-users text-[1.7rem]"></i> Applicants
        </a>
    </div>
</aside>