@extends('layout.user-master')
@section('content')
    <main class="flex flex-col justify-center items-center gap-4">
        {{-- Applicant Form Header --}}
        <livewire:applicant-form-header />
        {{-- Application Form --}}
        <form class="min-w-[120rem]">
            @csrf
            <livewire:applicant-form :job_id="$job_id" :job_name="$job_name" />
        </form>
    </main>
@endsection
