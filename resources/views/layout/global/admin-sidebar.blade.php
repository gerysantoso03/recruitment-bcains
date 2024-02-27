<aside class="flex flex-col">
    {{-- BCAinsurance Logo --}}
    <div class="flex justify-center items-center w-[22rem]">
        <img src="{{ asset('images/BCA-insurance.png') }}" alt="">
    </div>
    {{-- Sidebar Navigation --}}
    <div class="flex flex-col">
        {{-- Navigation Item --}}
        <a href="{{ route('dashboard') }}" class="{{ Route::is('dashboard') ? 'text-white bg-sky-900' : 'text-sky-950' }} px-4 py-6 flex gap-2 items-center font-semibold text-[1.5rem] shadow-gray-500 shadow-[0_1px_0_0]">
            <div class="w-[3rem] h-[3rem] flex items-center justify-center">
                <i class="fa-solid fa-gauge-high text-[1.8rem]"></i>
            </div> Dashboard
        </a>
        {{-- Navigation Item --}}
        <a href="{{ route('applicant') }}" class="{{ Route::is('applicant') ? 'text-white bg-sky-800' : 'text-sky-950' }} px-4 py-6 flex gap-2 items-center font-semibold text-[1.5rem] shadow-gray-500 shadow-[0_1px_0_0]">
            <div class="w-[3rem] h-[3rem] flex items-center justify-center">
                <i class="fa-solid fa-users text-[1.7rem]"></i>
            </div> Applicants
        </a>
        {{-- Navigation Item --}}
        <a href="{{ route('job') }}" class="{{ Route::is('job') ? 'text-white bg-sky-800' : 'text-sky-950' }} px-4 py-6 flex gap-2 items-center font-semibold text-[1.5rem] shadow-gray-500 shadow-[0_1px_0_0]">
            <div class="w-[3rem] h-[3rem] flex items-center justify-center">
                <i class="fa-solid fa-door-open text-[1.8rem]"></i>
            </div> Jobs
        </a>
        {{-- Navigation Item --}}
        <a href="{{ route('branch') }}" class="{{ Route::is('branch') ? 'text-white bg-sky-800' : 'text-sky-950' }} px-4 py-6 flex gap-2 items-center font-semibold text-[1.5rem] shadow-gray-500 shadow-[0_1px_0_0]">
            <div class="w-[3rem] h-[3rem] flex items-center justify-center">
                <i class="fa-solid fa-map-location-dot text-[1.8rem]"></i> 
            </div> Branches
        </a>
        {{-- Navigation Item --}}
        <a href="{{ route('department') }}" class="{{ Route::is('department') ? 'text-white bg-sky-800' : 'text-sky-950' }} px-4 py-6 flex gap-2 items-center font-semibold text-[1.5rem] shadow-gray-500 shadow-[0_1px_0_0]">
            <div class="w-[3rem] h-[3rem] flex items-center justify-center">
                <i class="fa-solid fa-building-user text-[1.8rem]"></i>
            </div> Departments
        </a>
        {{-- Navigation Item --}}
        <a href="{{ route('division') }}" class="{{ Route::is('division') ? 'text-white bg-sky-800' : 'text-sky-950' }} px-4 py-6 flex gap-2 items-center font-semibold text-[1.5rem] shadow-gray-500 shadow-[0_1px_0_0]">
            <div class="w-[3rem] h-[3rem] flex items-center justify-center">
                <i class="fa-solid fa-people-group text-[1.8rem]"></i> 
            </div> Divisions
        </a>
    </div>
</aside>