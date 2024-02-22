@extends('layout.admin-master')
@section('content')
    <main class="p-8 flex items-center justify-center">
        <div class="flex flex-col min-w-[90rem] max-w-[120rem] gap-4">
            {{-- Form Header --}}
            <div class="flex justify-between items-center">
                {{-- Back Button --}}
                <a href="{{ route('job') }}" class="flex items-center justify-center gap-2 text-[1.5rem] font-semibold text-sky-900 hover:text-sky-600 duration-500">
                    <i class="fa-solid fa-chevron-left text-[2.5rem]"></i> Back
                </a>
                {{-- Form Title --}}
                <h1 class="font-bold text-sky-900 text-[2.5rem]">Add New Job</h1>
            </div>
            {{-- Job Form --}}
            <form action="{{ route('add.job') }}" method="post" class="border-2 border-sky-900 rounded-lg flex flex-col gap-4 p-4">
                @csrf
                {{-- First Section --}}
                <div class="flex justify-start items-center gap-8">
                    {{-- Input Wrapper --}}
                    <div class="flex flex-col gap-1 flex-1">
                        <label for="position_name" class="font-semibold text-[1.7rem] text-sky-900">Position Name</label>
                        <input type="text" class="border border-sky-900 rounded-lg p-3" name="position_name">
                        @if ($errors->has('position_name'))
                            <span class="text-red-500 text-sm">{{ $errors->first('position_name') }}</span>
                        @endif
                    </div>
                </div>
                {{-- Second section --}}
                <div class="flex justify-start items-center gap-8">
                    {{-- Input Wrapper --}}
                    <div class="flex flex-col gap-1 flex-1">
                        <label for="department_id" class="font-semibold text-[1.7rem] text-sky-900">Department</label>
                        <select class="border border-sky-900 rounded-lg p-3" name="department_id">
                            @foreach ($departments as $department)
                                <option value="{{ $department['id'] }}">{{ $department['department_name'] }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('department_id'))
                            <span class="text-red-500 text-sm">{{ $errors->first('department_id') }}</span>
                        @endif
                    </div>
                    {{-- Input Wrapper --}}
                    <div class="flex flex-col gap-1 flex-1">
                        <label for="branch_id" class="font-semibold text-[1.7rem] text-sky-900">Branch</label>
                        <select class="border border-sky-900 rounded-lg p-3" name="branch_id">
                            @foreach ($branchs as $branch)
                                <option value="{{ $branch['id'] }}">{{ $branch['branch_name'] }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('branch_id'))
                            <span class="text-red-500 text-sm">{{ $errors->first('branch_id') }}</span>
                        @endif
                    </div>
                </div>
                {{-- Third Section --}}
                <div class="flex justify-start items-center gap-8">
                    {{-- Input Wrapper --}}
                    <div class="flex flex-col gap-1 flex-1">
                        <label for="end_date" class="font-semibold text-[1.7rem] text-sky-900">End Date</label>
                        <input type="date" class="border border-sky-900 rounded-lg p-3" name="end_date">
                        @if ($errors->has('end_date'))
                            <span class="text-red-500 text-sm">{{ $errors->first('end_date') }}</span>
                        @endif
                    </div>
                    {{-- Input Wrapper --}}
                    <div class="flex flex-col gap-1 flex-1">
                        <label for="employment_type" class="font-semibold text-[1.7rem] text-sky-900">Type of Contract</label>
                        <select class="border border-sky-900 rounded-lg p-3" name="employment_type">
                            <option value="Full-Time">Full Time</option>
                            <option value="Contract">Contract</option>
                            <option value="Outsource">Outsource</option>
                            <option value="Internship">Internship</option>
                            <option value="BDP">BDP</option>
                        </select>
                        @if ($errors->has('employment_type'))
                            <span class="text-red-500 text-sm">{{ $errors->first('employment_type') }}</span>
                        @endif
                    </div>
                </div>
                {{-- Job Qualification --}}
                <div class="flex flex-col gap-1">
                    <label for="qualifications" class="font-semibold text-[1.7rem] text-sky-900">Qualifications</label>
                    <textarea class="border border-sky-900 rounded-lg p-3" name="qualifications" id="jobQualification" cols="30" rows="10"></textarea>
                    @if ($errors->has('qualifications'))
                        <span class="text-red-500 text-sm">{{ $errors->first('qualifications') }}</span>
                    @endif
                </div>
                {{-- Submit Button --}}
                <div class="flex items-center justify-center">
                    <button class="bg-sky-800 text-white px-20 py-4 rounded-full text-[1.4rem]">Submit</button>
                </div>
            </form>
        </div>
    </main>
    <script>
        ClassicEditor
            .create(document.querySelector('#jobRole'))
            .catch(error => {
                console.error(error);
        });

        ClassicEditor
            .create( document.querySelector( '#jobQualification' ) )
            .catch( error => {
                console.error( error );
        });

        ClassicEditor
            .create( document.querySelector( '#jobActivities' ) )
            .catch( error => {
                console.error( error );
        });
    </script>
@endsection