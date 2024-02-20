@extends('layout.admin-master')
@section('content')
    <main class="p-4 flex flex-col items-center justify-center gap-4">
       {{-- Jobs Available --}}
       <h1 class="text-[2.5rem] text-sky-900 font-bold">Jobs Available</h1>
       {{-- Action Add Job --}}
       <div class="min-w-[90rem] max-w-[120rem] flex justify-start items-center gap-2">
            <a href="{{ route('add.job.form') }}" class="border-2 border-sky-900 hover:border-sky-500 duration-500 p-3 rounded-xl flex items-center justify-center">
                <i class="fa-solid fa-plus text-sky-800"></i>
            </a>
            <p class="text-[1.4rem] text-sky-900 font-semibold">Add New Job</p>
       </div>
       {{-- Jobs Card Wrapper --}}
       <div class="flex flex-col items-center justify-center gap-4">
            {{-- Job Card --}}
            @foreach ($jobs as $job)
            <div class="relative bg-sky-100 shadow shadow-gray-500 rounded-xl p-6 min-w-[90rem] max-w-[120rem]">
                <a href="{{ route('job.detail.admin', $job['id']) }}" class="flex gap-4">
                    {{-- Card left section --}}
                    <div class="flex flex-col gap-1 justify-start min-w-[60rem] max-w-[60rem]">
                        <h3 class="text-[1.8rem] font-bold text-sky-900">{{ $job['position_name'] }}</h3>
                        <p class="text-2xl text-sky-800 font-semibold">{{ $job['employment_type'] }}</p>
                        <p class="text-[1.2rem] text-sky-800">{{ $job->branch['branch_location'] }}</p>
                        <p class="text-[1.2rem]">{{ Str::words($job['qualifications'], '20', '...') }}</p>
                    </div>
                    {{-- Card right section --}}
                    <div class="flex flex-col justify-center items-start">
                        <p class="font-semibold text-[1.6rem] text-sky-900">{{ $job->department->division['division_name'] }}</p>
                        <p class="font-semibold text-[1.6rem] text-sky-900">{{ $job->department['department_name'] }}</p>
                        <p class="text-sky-800 text-[1.4rem]">{{ Carbon\Carbon::parse($job['post_date'])->toFormattedDateString() }} - {{ Carbon\Carbon::parse($job['end_date'])->toFormattedDateString() }}</p>
                    </div>
                    {{-- Action Buttons --}}
                    <div class="absolute flex gap-2 top-2 right-2">
                        <a href="{{ route('delete.job', $job['id']) }}" 
                        onclick="return confirm('Are you sure to delete this record?');"
                        class="border border-sky-900 hover:border-red-700 duration-500 p-3 flex items-center justify-center rounded-lg">
                            <i class="fa-solid fa-trash-can text-red-600"></i>
                        </a>
                        <a href="{{ route('update.job.form', $job['id']) }}" class="border border-sky-900 hover:border-amber-700 duration-500 p-3 flex items-center justify-center rounded-lg">
                            <i class="fa-solid fa-pen-to-square text-amber-600"></i>
                        </a>
                    </div>
                </a>
            </div>
            @endforeach
       </div>
    </main>
@endsection