@extends('layout.admin-master')
@section('content')
    <main class="p-8 flex flex-col items-center justify-center">
        {{-- Job Detail Wrapper --}}
        <div class="flex flex-col min-w-[90rem] max-w-[120rem]">
            {{-- Back Button --}}
            <div class="flex justify-between items-center w-full mb-4">
                <a href="{{ route('job') }}" class="flex items-center justify-center gap-2 text-[1.5rem] font-semibold text-sky-900 hover:text-sky-600 duration-500">
                    <i class="fa-solid fa-chevron-left text-[2.5rem]"></i> Back
                </a>
            </div>
            {{-- Job Detail General Information --}}
            <div class="border border-sky-900 flex flex-col gap-2 justify-start p-4 rounded-t-lg">
                <h3 class="text-[2rem] text-sky-900 font-bold">{{ $job['position_name'] }}</h3>
                <p class="text-[1.7rem] font-semibold text-sky-800">BCAinsurance</p>
                <p class="text-[1.5rem] font-semibold text-sky-800">{{ $job->branch['branch_location'] }}</p>
            </div>
            <div class="flex items-center justify-center p-4 rounded-b-lg border-b border-l border-r border-sky-900 mb-4">
                <p class="flex-1 font-bold text-[1.5rem] text-sky-900">Posted on : 
                    <span class="text-sky-800 text-[1.3rem]">{{ Carbon\Carbon::parse($job['post_date'])->toFormattedDateString() }}
                    </span>
                </p>
                <p class="flex-1 font-bold text-[1.5rem] text-sky-900">Expires on : 
                    <span class="text-sky-800 text-[1.3rem]">{{ Carbon\Carbon::parse($job['end_date'])->toFormattedDateString() }}
                    </span>
                </p>
            </div>
            {{--  Employment Type and Department and Working Detail --}}
            <div class="p-4 flex flex-col gap-2 border border-black rounded-md">
                {{-- Department and Working Type --}}
                <div class="flex border-b border-sky-950 pb-4">
                    <div class="flex-1 flex flex-col gap-1">
                        <h4 class="font-bold text-sky-900 tracking-wider">Employement Type</h4>
                        <p class="font-semibold text-[1.5rem] text-sky-800 tracking-wide">{{ $job['employment_type'] }}</p>
                    </div>
                    <div class="flex-1 flex flex-col gap-1">
                        <h4 class="font-bold text-sky-900 tracking-wider">Division</h4>
                        <p class="font-semibold text-[1.5rem] text-sky-800 tracking-wide">{{ $job->department->division['division_name'] }}</p>
                    </div>
                    <div class="flex-1 flex flex-col gap-1">
                        <h4 class="font-bold text-sky-900 tracking-wider">Department</h4>
                        <p class="font-semibold text-[1.5rem] text-sky-800 tracking-wide">{{ $job->department['department_name'] }}</p>
                    </div>
                </div>
                {{-- Working Detail Information --}}
                <div class="flex items-center justify-start">
                    {{-- Job Qualification --}}
                    <div class="flex flex-col gap-2">
                        <h4 class="font-bold text-sky-900 tracking-wide">Qualifications</h4>
                        <p class="text-sky-950 font-semibold text-[1.4rem]">{!! $job['qualifications'] !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection