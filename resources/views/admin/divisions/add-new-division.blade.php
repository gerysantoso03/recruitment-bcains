@extends('layout.admin-master')
@section('content')
    <main class="p-8 flex items-center justify-center">
        <div class="flex flex-col min-w-[90rem] max-w-[120rem] gap-4">
            {{-- Form Header --}}
            <div class="flex justify-between items-center">
                {{-- Back Button --}}
                <a href="{{ route('division') }}" class="flex items-center justify-center gap-2 text-[1.5rem] font-semibold text-sky-900 hover:text-sky-600 duration-500">
                    <i class="fa-solid fa-chevron-left text-[2.5rem]"></i> Back
                </a>
                {{-- Form Title --}}
                <h1 class="font-bold text-sky-900 text-[2.5rem]">Add New Division</h1>
            </div>
            {{-- Job Form --}}
            <form action="{{ route('add.division') }}" method="post" class="border-2 border-sky-900 rounded-lg flex flex-col gap-4 p-4">
                @csrf
                {{-- First Section --}}
                <div class="flex justify-start items-center gap-8">
                    {{-- Input Wrapper --}}
                    <div class="flex flex-col gap-1 flex-1">
                        <label for="division_name" class="font-semibold text-[1.7rem] text-sky-900">Division Name</label>
                        <input type="text" class="border border-sky-900 rounded-lg p-3" name="division_name">
                        @if ($errors->has('division_name'))
                            <span class="text-red-500 text-sm">{{ $errors->first('division_name') }}</span>
                        @endif
                    </div>
                    {{-- Input Wrapper --}}
                    <div class="flex flex-col gap-1 flex-1">
                        <label for="division_head" class="font-semibold text-[1.7rem] text-sky-900">Division Head</label>
                        <input type="text" class="border border-sky-900 rounded-lg p-3" name="division_head">
                        @if ($errors->has('division_head'))
                            <span class="text-red-500 text-sm">{{ $errors->first('division_head') }}</span>
                        @endif
                    </div>
                </div>
                {{-- Submit Button --}}
                <div class="flex items-center justify-center">
                    <button class="bg-sky-800 text-white px-20 py-4 rounded-full text-[1.4rem]">Submit</button>
                </div>
            </form>
        </div>
    </main>
@endsection