@extends('layout.admin-master')
@section('content')
    {{-- 
        List header untuk applicant detail : 
        - Applicant Info
        - Medical & Education & Skills
        - Employment Histories & Reference
        - Additional Information
        - Documents
        
        
        --}}
    {{-- Divide this detail page into several components
        - Applicant Information 
        - Medical & Education & Skills (Livewire)
        - Employment Histories and Reference (Livewire)
        - Additional Information (Livewire)
        - Documents (Livewire)
        --}}
    <main class="h-full">
        <livewire:applicant-detail :applicantDetail="$applicant" />
    </main>
@endsection
