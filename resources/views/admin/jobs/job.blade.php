@extends('layout.admin-master')
@section('content')
    <main class="p-16 relative">
        <p class="absolute top-[2rem] right-0 left-0 text-center text-md text-red-500">{!! session()->get('failed') !!}</p>
        <livewire:job-table />
    </main>
@endsection
