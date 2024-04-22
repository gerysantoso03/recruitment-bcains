<div class="flex flex-col gap-6 bg-sky-100 h-full duration-300 {{ $is_open ? 'w-72' : 'w-28' }} p-5 relative sidebar">
    <div wire:click="setIsOpen()"
        class="border bg-white w-[2.5rem] h-[2.5rem] rounded-full flex justify-center items-center absolute -right-5 top-10 cursor-pointer">
        <i
            class="fa-solid fa-arrow-left text-sky-950 font-semibold text-2xl duration-300 {{ $is_open ? 'rotate-180' : '' }}"></i>
    </div>
    {{-- SideBar Menu Header --}}
    <div class="flex items-center gap-4 py-3 {{ !$is_open ? 'justify-center' : '' }}">
        <div class="flex items-center justify-center {{ !$is_open ? 'w-28' : '' }}">
            <i
                class="fa-brands fa-app-store-ios text-sky-950 text-[3.5rem] duration-500 {{ $is_open ? 'rotate-[360deg]' : 'text-[4.5rem]' }}"></i>
        </div>
        <span class="text-[1.4rem] text-sky-900 font-semibold duration-500 {{ !$is_open ? 'hidden' : '' }}">
            BCAinsurance
        </span>
    </div>
    {{-- Sidebar Menu Item --}}
    <div class="flex flex-col gap-2 items-start justify-center">
        <a href="{{ route('dashboard') }}"
            class="{{ $currRoute == 'dashboard' ? 'bg-sky-800 text-white' : '' }} {{ !$is_open ? 'justify-center' : '' }} flex duration-500 gap-4 items-center w-full text-sky-900 text-[1.5rem] font-semibold cursor-pointer py-3 rounded-md">
            <div wire:click="setIsOpen()" class="w-[3rem] h-[3rem] flex items-center justify-center">
                <i class="fa-solid fa-gauge-high text-[2rem] {{ !$is_open ? 'text-[2.7rem]' : '' }}"></i>
            </div> <span class="{{ !$is_open ? 'hidden' : '' }}">Dashboard</span>
        </a>
        <a href="{{ route('applicant') }}"
            class="{{ $currRoute == 'applicant' || $currRoute == 'applicant.detail.admin' ? 'bg-sky-800 text-white' : '' }} {{ !$is_open ? 'justify-center' : '' }} flex duration-500 gap-4 items-center w-full text-sky-900 text-[1.5rem] font-semibold cursor-pointer py-3 rounded-md">
            <div wire:click="setIsOpen()" class="w-[3rem] h-[3rem] flex items-center justify-center">
                <i class="fa-solid fa-users text-[2rem] {{ !$is_open ? 'text-[2.7rem]' : '' }}"></i>
            </div> <span class="{{ !$is_open ? 'hidden' : '' }}">Applicants</span>
        </a>
        <a href="{{ route('job') }}"
            class="{{ $currRoute == 'job' ? 'bg-sky-800 text-white' : '' }} {{ !$is_open ? 'justify-center' : '' }} flex duration-500 gap-4 items-center w-full text-sky-900 text-[1.5rem] font-semibold cursor-pointer py-3 rounded-md">
            <div wire:click="setIsOpen()" class="w-[3rem] h-[3rem] flex items-center justify-center">
                <i class="fa-solid fa-door-open text-[2rem] {{ !$is_open ? 'text-[2.7rem]' : '' }}"></i>
            </div> <span class="{{ !$is_open ? 'hidden' : '' }}">Jobs</span>
        </a>
        <a href="{{ route('branch') }}"
            class="{{ $currRoute == 'branch' ? 'bg-sky-800 text-white' : '' }} {{ !$is_open ? 'justify-center' : '' }} flex duration-500 gap-4 items-center w-full text-sky-900 text-[1.5rem] font-semibold cursor-pointer py-3 rounded-md">
            <div wire:click="setIsOpen()" class="w-[3rem] h-[3rem] flex items-center justify-center">
                <i class="fa-solid fa-map-location-dot text-[2rem] {{ !$is_open ? 'text-[2.7rem]' : '' }}"></i>
            </div> <span class="{{ !$is_open ? 'hidden' : '' }}">Branches</span>
        </a>
        <a href="{{ route('department') }}"
            class="{{ $currRoute == 'department' ? 'bg-sky-800 text-white' : '' }} {{ !$is_open ? 'justify-center' : '' }} flex duration-500 gap-4 items-center w-full text-sky-900 text-[1.5rem] font-semibold cursor-pointer py-3 rounded-md">
            <div wire:click="setIsOpen()" class="w-[3rem] h-[3rem] flex items-center justify-center">
                <i class="fa-solid fa-building-user text-[2rem] {{ !$is_open ? 'text-[2.7rem]' : '' }}"></i>
            </div> <span class="{{ !$is_open ? 'hidden' : '' }}">Departments</span>
        </a>
        <a href="{{ route('division') }}"
            class="{{ $currRoute == 'division' ? 'bg-sky-800 text-white' : '' }} {{ !$is_open ? 'justify-center' : '' }} flex duration-500 gap-4 items-center w-full text-sky-900 text-[1.5rem] font-semibold cursor-pointer py-3 rounded-md">
            <div wire:click="setIsOpen()" class="w-[3rem] h-[3rem] flex items-center justify-center">
                <i class="fa-solid fa-people-group text-[2rem] {{ !$is_open ? 'text-[2.7rem]' : '' }}"></i>
            </div> <span class="{{ !$is_open ? 'hidden' : '' }}">Divisions</span>
        </a>
    </div>
</div>
