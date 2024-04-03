@extends('layout.user-master')
@section('content')
    <main class="flex flex-col justify-center items-center gap-4">
        <h1 class="text-sky-900 font-bold text-[3rem] mt-28">Application Form</h1>
        <a class="text-sky-900 text-md font-normal mt-4 mb-10">{{ $job['position_name'] }}</a>
        {{-- Applicant Form Header --}}
        <livewire:applicant-form-header />
        {{-- Application Form --}}
        <form class="min-w-[120rem]">
            @csrf
            <livewire:applicant-form />
        </form>
    </main>
@endsection
