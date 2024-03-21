@extends('layout.user-master')
@section('content')
    <main class="flex flex-col justify-center items-center gap-4">
        <h1 class="text-sky-900 font-bold text-[3rem]">Application Form</h1>
        {{-- Applicant Form Header --}}
        <livewire:applicant-form-header />
        {{-- Application Form --}}
        <form class="min-w-[120rem]">
            @csrf
            <livewire:applicant-form />
        </form>
    </main>
@endsection
