@extends('layout.user-master')
@section('content')
<main class="flex flex-col justify-center items-center">
    <h1 class="text-sky-900 font-bold text-[3rem]">Application Form</h1>
    {{-- Application Form --}}
    <div>
        <form class="min-w-[100rem]">
            @csrf
            <livewire:applicant-wizard/>
        </form>
    </div>
    {{-- Form Footer --}}
</main>
@endsection