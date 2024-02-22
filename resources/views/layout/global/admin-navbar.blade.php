{{-- <header class="px-16 py-4 flex items-center justify-center gap-8"> --}}
    {{-- Navbar Content --}}
    {{-- <div class="border bg-sky-50 rounded-lg flex items-center justify-around px-4 min-w-[90rem] max-w-[90rem]"> --}}
        {{-- BCAinsurance Logo --}}
        {{-- <a href="{{ route('dashboard') }}" class="w-64 flex items-center justify-center">
            <img src="{{ asset('images/BCA-insurance.png') }}" alt="BCAinsurance Logo">
        </a>
        <a href="{{ route('applicant') }}" class="{{ Route::is('applicant') ? 'bg-sky-200 rounded-xl py-3 px-6' : '' }} text-sky-900 font-semibold">Applicants</a>
        <a href="{{ route('job') }}" class="{{ Route::is('job') ? 'bg-sky-200 rounded-xl py-3 px-6' : '' }} text-sky-900 font-semibold">Jobs</a>
        <a href="" class="{{ Route::is('statistic') ? 'bg-sky-200 rounded-xl py-3 px-6' : '' }} text-sky-900 font-semibold">Statistics</a>
        <a class="flex items-center justify-center" href="{{ route('logout') }}">
            <i class="fa-solid fa-right-from-bracket hover:text-red-500 duration-500 text-red-800 text-[2.5rem]"></i>
        </a>
    </div>
</header> --}}
{{-- Previous Header Above --}}

{{-- Current Header --}}
<header class="flex justify-between w-full h-[7rem] items-center px-8 py-4 shadow-[0_1px_0_0] shadow-gray-300">
    <h3 class="text-sky-900 font-bold text-[2rem]">PT. Asuransi Umum BCA</h3>
    <div class="flex gap-2 relative">
        <div class="flex justify-center items-center bg-sky-900 rounded-full w-[3rem] h-[3rem]">
            <i class="fa-solid fa-user-tie text-white text-[1.7rem]"></i>
        </div>
        <div class="flex justify-center items-center gap-1">
            <p class="text-[1.5rem] text-sky-900 font-semibold">{{ Auth::user()->username }}</p>
            <i class="fa-solid fa-chevron-down duration-500 text-[1.4rem] text-sky-800 cursor-pointer" id="showBtnLogout"></i>
        </div>
        <a href="{{ route('logout') }}" class="btn-logout" id="btnLogout">
            <i class="fa-solid fa-arrow-right-from-bracket text-[1.7rem]"></i>
            Sign Out
        </a>
    </div>
</header>