@extends('layout.user-master')
@section('content')
    @if (session('application-success'))
        <div id="success-application" class="bg-sky-800 text-center py-4 lg:px-4">
            <div class="p-2 bg-sky-700 items-center text-sky-100 leading-none lg:rounded-full flex lg:inline-flex"
                role="alert">
                <span
                    class="flex text-[1.2rem] rounded-full bg-sky-500 uppercase px-2 py-1 text-xs font-bold mr-3">New</span>
                <span class="font-semibold mr-2 text-left flex-auto text-sm">{{ session('application-success') }}</span>
            </div>
        </div>
    @endif
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the alert element
            var alertElement = document.getElementById('success-application');

            // Hide the alert after 5 seconds
            setTimeout(function() {
                alertElement.classList.add('hidden');
            }, 2000); // 5000 milliseconds = 5 seconds
        });
    </script>
@endsection
